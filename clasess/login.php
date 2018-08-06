<?php
class login extends ACore {
    
    protected function obr(){
        $login = strip_tags (mysqli_real_escape_string($this->database, $_POST['login']));
        $password = strip_tags (mysqli_real_escape_string($this->database, $_POST['password']));
    
        if(!empty($login) AND !empty($password)) {
            $password = md5($password);
            
            $query = "SELECT id FROM ussers WHERE name=" . $login . "AND password=" . $password;
            $result = mysqli_query($this->database, $query);
            print_r($result);
            if(!$result) {
                exit(mysqli_error($this->database));
            }
            if(mysqli_num_rows($result) == 1) {
                $_SESSION['user'] = TRUE;
                header("Location;?option=admin");
                exit();
            } else {
                exit ("Toks vartuotojas neegzistuoja");
            }
            
        } else {
            exit ("Uzpildykite visus laukus");
        }
    }
    public function getContent(){
        ?>
     <div id=main>
        <form enctype='multipart/form-data' action='' method='POST'>
            <p>Login<br />
        <input type='text' name='login' style='width: 420px;'>        
    </p>
    <p>Slaptazodis<br />
        <input type='password' name='password'>        
    </p>
    <p><input type='submit' name='button' value='Prisijungti'></p></form></div>    


</div>

<?php
    }
}

