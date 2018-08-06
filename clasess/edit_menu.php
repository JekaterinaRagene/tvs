<?php

class edit_menu extends ACoreAdmin{
   
    public function getContent() {
        $query = "SELECT id_menu, name_menu From menu";
        $result = mysqli_query($this->database, $query);
        if(!$result) {
            echo mysqli_error($this->database);
            exit;
        }
        ?>
        <div id=main>  
        <a style="color:#dc3545" href="?option=add_menu"<a>Įdėti naują menu punkta</a><hr>
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
            <a style='color:#585858' href="?option=update_menu&id_text=<?php echo $row['id_menu']; ?>"<a><?php echo $row['name_menu']; ?><br>Redaguoti meniu</a> |
            <a style='color:#dc3545' href="?option=delete_menu&delete=id<?php echo $row['name_menu']; ?>"<a>Ištrinti straipsnį</a>
        </p>
<?php
         
        }
       
        echo '</div>
             </div>';
    }
    
}
