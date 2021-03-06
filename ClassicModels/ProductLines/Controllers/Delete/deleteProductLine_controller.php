<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\ProductLines\Controllers\Delete;

require_once '../../../public/sessionController3.php';

require_once '..\..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoProductLineRepository.php';
use Mohamed\ClassicModels\ProductLines\PDOProductLineRepository;

$config = require_once "../../../config.php";

try{
    $factory = new factoryConnection($config);
    $repository = new PDOProductLineRepository($factory->get());
    $productLine = $repository->delete($_GET['name']);
    header("Location: ../Read/listProductLines_controller.php");
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>