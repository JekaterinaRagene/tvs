<?php

class delete_menu extends ACoreAdmin {
    public function obr() {
        if($_GET['delete']) {
            $id_category = (int)$_GET['delete'];
            
            $query = "DELETE FROM categories WHERE id_category=" . $id_category;
            
            if(mysqli_query($this->database, $query)) {
                $_SESSION['res'] = "Istrinta";
                header("Location:?option=edit_menu");
                exit();
            } else {
                exit ("Trinimo klaida");
            }            
        } else {
            exit ('Neteisingi duomenys siam puslapiui');
        }
    }
    public function getContent() {
    }

}


