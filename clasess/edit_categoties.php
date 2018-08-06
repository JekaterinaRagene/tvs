<?php

class edit_categories extends ACoreAdmin{
   
    public function getContent() {
        $query = "SELECT id_category, name_category From categories";
        $result = mysqli_query($this->database, $query);
        if(!$result) {
            echo mysqli_error($this->database);
            exit;
        }
        ?>
        <div id=main>  
        <a style="color:#dc3545" href="?option=add_menu"<a>Įdėti naują kategorija</a><hr>
        <?php       
        if(isset($_SESSION['res'])) if($_SESSION['res']!="") {
        echo ($_SESSION['res']);
        unset($_SESSION['res']);
        }
        $row = [];
        for($i = 0; $i < mysqli_num_rows($result); $i++) {
            $row= mysqli_fetch_assoc($result);
        ?>
        <p style='fotnt-sizepx:'>
            <a style='color:#585858' href="?option=update_categories&id_text=<?php echo $row['id_category']; ?>"<a><?php echo $row['name_category']; ?><br>Redaguoti kategorija</a> |
            <a style='color:#dc3545' href="?option=delete_categories&delete=id<?php echo $row['name_category']; ?>"<a>Ištrinti straipsnį</a>
        </p>
<?php
         
        }
       
        echo '</div>
             </div>';
    }
    
}
