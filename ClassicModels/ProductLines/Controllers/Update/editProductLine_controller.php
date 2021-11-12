<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\ProductLines\Controllers\Update;

require_once "../../../factoryConnection.php";
use Mohamed\ClassicModels\FactoryConnection;
require_once "../../pdoProductLineRepository.php";
use Mohamed\ClassicModels\ProductLines\PDOProductLineRepository;
require_once "../../ProductLine.php";
use Mohamed\ClassicModels\ProductLines\ProductLine;

$config = require_once "../../../config.php";

try{
    $factory = new factoryConnection($config);
    $repository = new PDOProductLineRepository($factory->get());
    $currentName = $_GET['name'];
    $productLine = $repository->get($currentName);
    $enableDelete = strlen($currentName) > 0;
    require "../../Views/formProductLine.php";
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>