<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Customers\Controllers\Read;

session_start();

if(!isset($_SESSION['login'])){
    header('Location: ../../../Auth/login.php');
    die();
}

require_once '..\..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoCustomerRepository.php';
use Mohamed\ClassicModels\Customers\PDOCustomerRepository;

$config = require_once '../../../config.php';

try{
    $factory = new FactoryConnection($config);
    $repository = new PDOCustomerRepository($factory->get());
    $customers = $repository->getAll();
    require '../../Views/listCustomers_view.php';
}catch(PDOException $e){
    print '¡Error!: ' . $e->getMessage() . '<br/>';
    die();
}finally{
    $repository = null;
}
?>