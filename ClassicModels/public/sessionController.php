<?php
session_start();

if(!isset($_SESSION['login'])){
    header('Location: Auth/login.php');
    die();
}
?>