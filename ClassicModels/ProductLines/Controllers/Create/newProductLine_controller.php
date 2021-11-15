<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Employees\Controllers\Create;
session_start();

if(!isset($_SESSION['login'])){
    header('Location: ../../../Auth/login.php');
    die();
}

require_once "../../ProductLine.php";
use Mohamed\ClassicModels\ProductLines\ProductLine;

$currentName = '';
$enableDelete = strlen($currentName);
$productLine = new ProductLine($currentName, null, null);
require_once '../../Views/formProductLine.php';

?>