<?php
class view extends ACore {
    public function getContent(){
        if(!$_GET['id_text']) {
            echo 'Neteisingi duomenys teksto isveidmui';
        } else {
            $id_text = (int)$_GET['id_text'];
            if(!$id_text) {
                echo 'Neteisingi duomenys teksto isveidmui';
            } else {
                $query = "SELECT id, title, text, date, img_src FROM straipsniai WHERE id =" . $id_text;
                $result = mysqli_query($this->database, $query);
                
                if(!$result) {
                    echo mysqli_error($this->database);
                    exit;
                }
                $row = mysqli_fetch_assoc($result);
                ?>
                <div class="card mb-4">
                    <img class="card-img-top" src="<?php echo $row['img_src'] ;?>" alt="Card image cap">
                  <div class="card-body">
                    <h2 class="card-title"><?php echo $row['title'] ;?></h2>
                    <p class="card-text"><?php echo $row['text'] ;?></p>
                  </div>
                  <div class="card-footer text-muted">
                    <?php echo $row['date'];?>
                    <a href="#">Start Bootstrap</a>
                  </div>
                </div>
      
 <?php         
}}}}
?>