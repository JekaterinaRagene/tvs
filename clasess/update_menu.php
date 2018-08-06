<?php
class update_menu extends ACoreAdmin {
    protected function obr() {
       
        $id = $_POST['id_menu'];
        $title = $_POST['name_menu'];        
        $text = $_POST['text_menu'];
        
if(empty($title) || empty($text)) {
    echo mysqli_error($this->database);
    exit("Neužpildyti butini laukai");
}
$query = "UPDATE menu SET name_menu='$title', text_menu='$text' WHERE id_menu=" . $id;
   
if(!mysqli_query($this->database, $query)) {
   echo mysqli_error($this->database);
   echo mysqli_error($this->database);
                exit;;
} else {
    $_SESSION['res'] = "Pakeitimai įrasyti";
    header("Location:?option=edit_menu");
    exit;
} 
}    
    public function getContent() {
        if(isset($_GET['id_text'])) if($_GET['id_text']!=="") {
            $id_menu = (int)$_GET['id_text'];
        } else {
            echo mysqli_error($this->database);
            exit ("Neteisingi duomenis siam puslapiui");
        }
        $menu = $this->get_text_menu($id_menu);
        print_r($menu);
      ?>
<div id='main'>
    <?php
        
    if(isset($_SESSION['res'])) if($_SESSION['res']!="") {
        echo ($_SESSION['res']);
        unset($_SESSION['res']);
    }
    
    ?>
    <form action='' method='POST'>
        <p><h1>Menu</h1><br>
            <input type='text' name='title' style='width: 420px;' value="<?php echo $menu['name_menu']; ?>">
            <input type='hidden' name='title' style='width: 420px;' value="<?php echo $menu['id_menu']; ?>">
        </p>       
        <p>Tekstas<br>
            <textarea name='text' cole='500' rowq='?'><?php echo $menu['text_menu']; ?></textarea>      
        </p>
        <p>
            <input type='submit' name='button' value='Išsaugoti'>
        </p>
    </form>
</div>    
    
    <?php
    }
    }

?>



