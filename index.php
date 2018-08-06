<?php
session_start();
header("Content-Type:text/html;charset='utf-8'");

require_once 'config.php';
require_once 'clasess/ACore.php';
require_once 'clasess/ACoreAdmin.php';

if(isset($_GET['option'])) if($_GET['option'] != "") {    
    $class = trim(strip_tags($_GET['option'])); 
} else {
    $class = 'main';
}
if(file_exists("clasess/" . $class . ".php")) {
    include("clasess/" . $class . ".php");
    if(class_exists($class)) {
        
        $obj = new $class;
        $obj->getBody();
    } else {
        exit("<p>neteisingi iejimo duomenys</p>");
    }
} else {
    exit("<p>neteisingas puslapio adresas</p>");
}
?>

