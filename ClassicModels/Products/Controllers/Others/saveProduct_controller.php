<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Products\Controllers\Update;
session_start();

if(!isset($_SESSION['login'])){
    header('Location: ../../../Auth/login.php');
    die();
}
require_once "../../../factoryConnection.php";
use Mohamed\ClassicModels\FactoryConnection;
require_once "../../pdoProductRepository.php";
use Mohamed\ClassicModels\Products\PDOProductRepository;
require_once "../../Product.php";
use Mohamed\ClassicModels\Products\Product;

$stock = intval($_POST['stock']);
$price = intval($_POST['price']);
$msrp = floatval($_POST['msrp']);
$update = isset($_POST['update']) ? true : false;

$product = new Product($_POST['code'], $_POST['name'], $_POST['line'], $_POST['scale'], $_POST['vendor'], $_POST['description'], $stock != 0 ? $stock : null, $price != 0 ? $price : null, $msrp != 0 ? $msrp : null);

$errores = $product->validate();
if(count($errores) > 0){
    require "../../Views/formProduct.php";
    die();
}

$config = require_once "../../../config.php";
try{
    $factory = new factoryConnection($config);
    $repository = new PDOProductRepository($factory->get());

    if($update){
        $repository->update($product);
    }else{
        $repository->insert($product);
    }

    header("Location: ../Read/listProducts_controller.php");
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>