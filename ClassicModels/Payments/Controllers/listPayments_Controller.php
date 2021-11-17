<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Payments\Controllers;

require_once '../../public/sessionController2.php';

require_once '..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\pdoPaymentRepository.php';
use Mohamed\ClassicModels\Payments\PDOPaymentRepository;

$config = require_once '../../config.php';

try{
    $factory = new FactoryConnection($config);
    $repository = new PDOPaymentRepository($factory->get());
    $payments = $repository->getAll();
    require '../Views/listPayments_view.php';
}catch(PDOException $e){
    print '¡Error!: ' . $e->getMessage() . '<br/>';
    die();
}finally{
    $repository = null;
}
?>