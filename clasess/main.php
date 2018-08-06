<?php
class main extends ACore {
    public function getContent(){
        ?>
        <!-- Page Content -->
        <div id=main>
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">
            <small>Sveika ir subalansuota mityba padeda išvengti ligų ir išlaikyti norimą formą. Ne veltui sakoma, kad 70% lemia mityba, o 30% sportas.</small>
          </h1>
            <?php
            $query = "SELECT id, title, discription, date, img_src FROM straipsniai ORDER BY date DESC";
            $result = mysqli_query($this->database, $query);
            if(!$result) {
                echo mysqli_error($this->database);
                exit;
            }
            ?>
          <!-- Blog Post -->          
                <?php 
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
              </div>
        </div>
        <?php
    }
    }
}
