<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Orders\Controllers;

require_once '../../public/sessionController2.php';

require_once '..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\pdoOrderRepository.php';
use Mohamed\ClassicModels\Orders\PDOOrderRepository;

$config = require_once '../../config.php';

try{
    $factory = new FactoryConnection($config);
    $repository = new PDOOrderRepository($factory->get());
    $orders = $repository->getAll();
    require '../Views/listOrders_view.php';
}catch(PDOException $e){
    print '¡Error!: ' . $e->getMessage() . '<br/>';
    die();
}finally{
    $repository = null;
}
?>