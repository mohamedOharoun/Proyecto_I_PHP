<?php
if(session_status() != 2){
    session_start();
}

if(!isset($_SESSION['login'])){
    header('Location: ../../Auth/login.php');
    die();
}

?>