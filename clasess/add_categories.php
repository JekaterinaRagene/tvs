

<?php
class add_categories extends ACoreAdmin {
    protected function obr() {
       
        $id = $_POST['id_category'];
        $name = $_POST['name_category'];
                
if(empty($id) || empty($name)) {
    echo mysqli_error($this->database);
    exit("Neužpildyti butini laukai");
}
$query = "INSERT INTO categories (id_category, name_category)
    VALUES('$id', '$name') ";
if(!mysqli_query($this->database, $query)) {
   echo mysqli_error($this->database);
   echo mysqli_error($this->database);
                exit;;
} else {
    $_SESSION['res'] = "Pakeitimai įrasyti";
    header("Location:?option=add_categories");
    exit;
} 
}    
    public function getContent() {
    ?>
    <div id=main>
    <?php 
    if(isset($_SESSION['res'])) if($_SESSION['res']!=""){
        echo $_SESSION['res'];
        unset($_SESSION['res']);
    }
    ?>
    <form  action='' method='POST'>
        <p><h1>Kategorijos</h1><br />
       
     <p>Pavedinimas<br />
        <textarea name='text' cole='500' rowq='?'></textarea>      
    </p>
    <p><input type='submit' name='button' value='Išsaugoti'></p></form></div>    
</div>
<?php
}}


