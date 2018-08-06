<?php

abstract class ACoreAdmin {
    
    protected $database;
    
    public function __construct() {
        
        if(!$_SESSION['user']){
            header("Location:?option=login");
        }
        $this->database = mysqli_connect(HOST, USER, PASSWORD);
        if(!$this->database) {
            exit("SUJUMGIMO KLAUDA SU DB" . mysqli_error());
        }
        if(!mysqli_select_db($this->database, DB)) {
            exit("Tokios db nera" . mysqli_error());
        } 
        mysqli_set_charset($this->database, "UTF8");            
    }    
    protected function getHeader() {
       include "header.php";
    }
    protected function getRightBar() {
       ?>
<div id=main>
        <div class="card my-4">
            <h5 class="card-header">Admin skyriai:</h5>            
        <div class="card-body">
          <div class="row">
             <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                  <li>
                      <a href="?option=admin">Straipsniai</a>
                    </li>
                    <li>
                      <a href="?option=edit_menu">Menu</a>
                    </li><li>
                      <a href="?option=edit_categories">Kategorijos</a>
                    </li>
            </div>
            </div>
        </div>
        </div>
        </div>
<?php        
    }
    protected function getMenu() {
        
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">            
          <a class="navbar-brand" href="?option=main">SVEIKOS GYVENSENOS KOMPASAS</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>        
          
        </div>
        </nav>
            <?php
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
    
    public function getBody() {
        
        if($_POST) {
            $this->obr();
        }
        if(isset($_GET['delete'])) if($_GET['delete']!="") {
            $this->obr();
        }
        $this->getHeader();               
        $this->getMenu();
        $this->getRightBar();
        $this->getContent(); 
        $this->getFooter();
        
    }
    
    abstract function getContent();
    
    protected function get_categories() {
        $query = "SELECT id_category, name_category FROM categories";
        $result = mysqli_query($this->database, $query);
        if(!$result) {
            echo mysqli_error($this->database);
            exit;
        }       
        $row = [];
        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
        $row [] = mysqli_fetch_assoc($result);
        }
        return $row;
    }
    
    protected function get_text_straipsniai($id) {
        $query = "SELECT id, title, discription, text, categories FROM straipsniai WHERE id=" . $id;
        $result = mysqli_query($this->database, $query);
        if(!$result) {
            echo mysqli_error($this->database);
            exit;
        }       
        $row = [];
        $row [] = mysqli_fetch_assoc($result);        
        return $row;
    }
    protected function get_text_menu($id) {
        $query = "SELECT id_menu, name_menu, text_menu FROM menu WHERE id_menu=" . $id;
        $result = mysqli_query($this->database, $query);
        if(!$result) {
            echo mysqli_error($this->database);
            exit;
        }       
        $row = [];
        $row [] = mysqli_fetch_assoc($result);        
        return $row;
    }
}
?>
