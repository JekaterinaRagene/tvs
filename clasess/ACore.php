<?php

abstract class ACore {
    
    protected $database;
    
    public function __construct() {
        $this->database = mysqli_connect(HOST, USER, PASSWORD);
        if(!$this->database) {
            exit("SUJUMGIMO KLAUDA SU DB" . mysqli_error());
        }
        if(!mysqli_select_db($this->database, DB)) {
            exit("Tokios db nera" . mysqli_error());
        } 
        mysqli_set_charset($this->database, "utf8");            
    }    
    protected function getHeader() {
       include "header.php";
    }
    protected function getRightBar() {
        $query = "SELECT id_category, name_category FROM categories";
        $result = mysqli_query($this->database, $query);
        
        if(!$result) {
            echo mysqli_error($this->database);
            exit;
        }        
        $row = [];?>
        <div class="card my-4">
            <h5 class="card-header">Kategorijos</h5>            
        <div class="card-body">
          <div class="row">
 <?php 
    for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $row = mysqli_fetch_assoc($result);
?>
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
            <li>
          <a href="?option=categories&id_cat=<?php echo $row['id_category'];?>"
             class="btn btn-primary"><?php echo $row['name_category'];?> </a>
            </li><?php
    }?>
            </div>
            </div>
        </div>
        </div>
<?php        
    }
    protected function getMenu() {
        $row = $this->menuArray();
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">            
          <a class="navbar-brand" href="?option=main">SVEIKOS GYVENSENOS KOMPASAS</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <?php
          foreach($row as $item) {
              ?>
          <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="?option=menu&id_menu=<?php echo $item['id_menu'] ;?>"><?php echo $item['name_menu'] ;?></a>
            </li>
          <?php          
          }
          ?> 
          </ul>
          </div>
        </div>
        </nav>
            <?php
    }    
    protected function menuArray() {  
        $query = "SELECT id_menu, name_menu FROM menu";        
        $result = mysqli_query($this->database, $query);
        if(!$result) {
            echo mysqli_error($this->database);
            exit;
        }
        $row = [];
        for($i = 0; $i < mysqli_num_rows($result); $i++){
            $row[] = mysqli_fetch_assoc($result);
        }
        return $row;
    }    
    protected function getFooter(){
           ?> 
        </div>
        <!-- /.row -->

        </div>
        <!-- /.container -->
        <!-- Footer -->
        <footer class="py-5 bg-dark">
          <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
          </div>
          <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      </body>

    </html>
 <?php
    }
    protected function getSearch(){
        ?>
        <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

              <!-- Search Widget -->
              <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
    <?php
    }
    public function getBody() {
        
        if($_POST) {
            $this->obr();
        }
        $this->getHeader();
        $this->getContent();        
        $this->getMenu();
        $this->getSearch();
        $this->getRightBar();
        $this->getFooter();
        
    }
    
    abstract function getContent();
}
?>
