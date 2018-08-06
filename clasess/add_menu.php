<?php
class add_menu extends ACoreAdmin {
    protected function obr() {
       
        $title = $_POST['title'];
        $text = $_POST['text'];
                
if(empty($title) || empty($text)) {
    echo mysqli_error($this->database);
    exit("Neužpildyti butini laukai");
}
$query = "INSERT INTO menu (name_menu,  text_menu)
    VALUES('$title', '$text') ";
if(!mysqli_query($this->database, $query)) {
   echo mysqli_error($this->database);
   echo mysqli_error($this->database);
                exit;;
} else {
    $_SESSION['res'] = "Pakeitimai įrasyti";
    header("Location:?option=add_menu");
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
        <p><h1>Menu</h1><br />
        <input type='text' name='title' style='width: 420px;'>        
       
     <p>Tekstas<br />
        <textarea name='text' cole='500' rowq='?'></textarea>      
    </p>
    <p><input type='submit' name='button' value='Išsaugoti'></p></form></div>    
</div>
<?php
}}


