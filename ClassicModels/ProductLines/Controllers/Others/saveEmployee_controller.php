<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Controllers\Others;
session_start();

if(!isset($_SESSION['login'])){
    header('Location: ../../Auth/login.php');
    die();
}

require_once "../../../factoryConnection.php";
use Mohamed\ClassicModels\FactoryConnection;
require_once "../../pdoProductLineRepository.php";
use Mohamed\ClassicModels\ProductLines\PDOProductLineRepository;
require_once "../../ProductLine.php";
use Mohamed\ClassicModels\ProductLines\ProductLine;

$currentName = $_POST['currentName'];
$productLine = new ProductLine($_POST['name'],
                              $_POST['textDescription'],
                              $_POST['htmlDescription']);

$errores = $productLine->validate();

if(count($errores) > 0){
    $enableDelete = strlen($currentName > 0);
    require '../../Views/formProductLine.php';
    die();
}

$config = require_once "../../../config.php";

try{
    $factory = new factoryConnection($config);
    $repository = new PDOProductLineRepository($factory->get());

    if(isset($_FILES['image']) && $_FILES['image']['size'] > 0){
        $image = file_get_contents($_FILES['image']['tmp_name']);
    }else{
        $image = null;
    }

    if(strlen($currentName) > 0){
        $repository->update($currentName, $productLine, $image);
    }else{
        $repository->insert($productLine, $image);
    }

    header('Location: ../Read/listProductLines_controller.php');
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>