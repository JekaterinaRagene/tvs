<?php
class menu extends ACore {
    public function getContent(){
        if(!$_GET['id_menu']) {
            echo 'Neteisingi duomenys menu isveidmui';
        } else {
            $id_menu = (int)$_GET['id_menu'];
            if(!$id_menu) {
                echo 'Neteisingi duomenys menu isveidmui';
            } else {
                $query = "SELECT id_menu, name_menu, text_menu FROM menu WHERE id_menu =" . $id_menu;
                $result = mysqli_query($this->database, $query);
                
                if(!$result) {
                    echo mysqli_error($this->database);
                    exit;
                }
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="card-body">
                    <h2 class="card-title"><?php echo $row['name_menu'] ;?></h2>
                    <p class="card-text"><?php echo $row['text_menu'] ;?></p>
                </div>
      
 <?php         
}}}}
?>

