<?php
class categories extends ACore {
    public function getContent(){
?> 
<!-- Page Content -->
    <div class="container">
      <div class="row">
          <!-- Blog Entries Column -->
        <div class="col-md-8">
          <h1 class="my-4">
            <small></small>
          </h1>
            <?php
            if(!$_GET['id_cat']) {
            echo 'Neteisingi duomenys teksto isveidmui';
            } else {
            $id_cat = (int)$_GET['id_cat'];
            if(!$id_cat) {
                echo 'Neteisingi duomenys teksto isveidmui';
            } else {
            $query = "SELECT id, title, discription, date, img_src, categories FROM straipsniai WHERE categories =" . $id_cat ;
            $result = mysqli_query($this->database, $query);
            if(!$result) {
                echo mysqli_error($this->database);
                exit;
            }
            if(mysqli_num_rows($result) > 0) { 
                for($i = 0; $i < mysqli_num_rows($result); $i++) {
                    $row = mysqli_fetch_assoc($result);                    
                ?>
            <div class="card mb-4">
              <img class="card-img-top" src="<?php echo $row['img_src'] ;?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><?php echo $row['title'] ;?></h2>
              <p class="card-text"><?php echo $row['discription'] ;?></p>
              <a href="?option=view&id_text=<?php echo $row['id'] ;?>" class="btn btn-primary">Daugiau &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              <?php echo $row['date'];?>
              <a href="#">Start Bootstrap</a>
            </div>
                <?php }
                ?>
            </div>
            <?php
            
                } else {
                    echo 'Šioje kategorijoje nėra sukurtų straipsnių :(';
                }   
            }
            }
}}
?>

