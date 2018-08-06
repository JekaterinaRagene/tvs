<?php
class add_straipsniai extends ACoreAdmin {
    protected function obr() {
       
        if (!empty($_FILES['img_src']['tmp_name'])){
            $destination = '../tvs/file/' . $_FILES['img_src']['name'];
            $fileName = $_FILES['img_src']['tmp_name'];
            if(!move_uploaded_file($fileName, $destination)) {
                echo mysqli_error($this->database);
                exit('Nepavyko įkelti paveikslėlio');
            }
            $img_src = 'tvs/file/'.$_FILES['img_src']['name']; 
        } else {
            echo mysqli_error($this->database);
            exit ('Reikia įkelti paveikslelį');
        }
        $title = $_POST['title'];
        $date = date("Y-m-d", time());
        $discription = $_POST['discription'];
        $text = $_POST['text'];
        $categories = $_POST['categories'];
        
if(empty($title) || empty($text) || empty($discription)) {
    echo mysqli_error($this->database);
    exit("Neužpildyti butini laukai");
}
$query = "INSERT INTO straipsniai (title, img_src, date, text, discription, categories)
    VALUES('$title', '$img_src', '$date', '$text', '$discription', '$categories') ";
if(!mysqli_query($this->database, $query)) {
   echo mysqli_error($this->database);
   echo mysqli_error($this->database);
                exit;;
} else {
    $_SESSION['res'] = "Pakeitimai įrasyti";
    header("Location:?option=add_straipsniai");
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
    $categories = $this->get_categories();

    ?>
    <form enctype='multipart/form-data' action='' method='POST'>
        <p><h1>Straipsnio pavadinimas</h1><br />
        <input type='text' name='title' style='width: 420px;'>        
    </p>
    <p>Nuotrauka<br />
        <input type='file' name='img_src'>        
    </p>
    <p>Trumpas aprašymas<br />
        <textarea name='discription' cole='500' row='?'></textarea>      
    </p>
     <p>Tekstas<br />
        <textarea name='text' cole='500' rowq='?'></textarea>      
    </p>
    <select name='categories'>
<?php
foreach ($categories as $item) {
    echo "<option value=" . $item['id_category'] . ">" . $item['name_category']. '</option>';
    } 
    echo "</select><p><input type='submit' name='button' value='Išsaugoti'></p></form></div>    
</div>";  
    }
}
?>


