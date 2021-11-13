<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Products\Controllers\Read;

require_once '..\..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoProductRepository.php';
use Mohamed\ClassicModels\Products\PDOProductRepository;

$config = require_once '../../../config.php';

try{
    $factory = new FactoryConnection($config);
    $repository = new PDOProductRepository($factory->get());
    $products = $repository->getAll();
    require '../../Views/listProducts_view.php';
}catch(PDOException $e){
    print '¡Error!: ' . $e->getMessage() . '<br/>';
    die();
}finally{
    $repository = null;
}
?>