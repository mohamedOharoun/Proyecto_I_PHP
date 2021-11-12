<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\ProductLines\Controllers\Read;

require_once '..\..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoProductLineRepository.php';
use Mohamed\ClassicModels\ProductLines\PDOProductLineRepository;

$config = require_once '../../../config.php';

try{
    $factory = new FactoryConnection($config);
    $repository = new PDOProductLineRepository($factory->get());
    $productLines = $repository->getAll();
    require '../../Views/listProductLines_view.php';
}catch(PDOException $e){
    print '¡Error!: ' . $e->getMessage() . '<br/>';
    die();
}finally{
    $repository = null;
}
?>