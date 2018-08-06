<?php

class delete_straipsniai extends ACoreAdmin {
    public function obr() {
        if($_GET['delete']) {
            $id_text = (int)$_GET['delete'];
            
            $query = "DELETE FROM straipsniai WHERE id=" . $id_text;
            
            if(mysqli_query($this->database, $query)) {
                $_SESSION['res'] = "Istrinta";
                header("Location:?option=admin");
                exit;
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
