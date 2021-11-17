<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Products\Controllers\Delete;

require_once '../../../public/sessionController3.php';

require_once '..\..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoProductRepository.php';
use Mohamed\ClassicModels\Products\PDOProductRepository;
require_once "../../product.php";
use Mohamed\ClassicModels\Products\Product;

$config = require_once "../../../config.php";

try{
    $factory = new factoryConnection($config);
    $repository = new PDOProductRepository($factory->get());
    $product = $repository->delete($_GET['code']);
    header("Location: ../Read/listProducts_controller.php");
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>