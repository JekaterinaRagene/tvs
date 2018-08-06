<?php
class admin extends ACoreAdmin {
    
    public function getContent() {
        $query = "SELECT id, title From straipsniai";
        $result = mysqli_query($this->database, $query);
        if(!$result) {
            echo mysqli_error($this->database);
            exit;
        }
        ?>
        <div id=main>  
        <a style="color:#dc3545" href="?option=add_straipsniai"<a>Įdėti naują straipsnį</a><hr>
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
            <a style='color:#585858' href="?option=update_straipsniai&id_text=<?php echo $row['id']; ?>"<a><?php echo $row['title']; ?><br>Redaguoti straipsnį</a> |
            <a style='color:#dc3545' href="?option=delete_straipsniai&delete=<?php echo $row['id']; ?>"<a>Ištrinti straipsnį</a>
        </p>
<?php
         
        }
       
        echo '</div>
             </div>';
    }
    
}

