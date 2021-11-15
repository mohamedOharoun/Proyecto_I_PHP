<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Customers\Controllers\Create;
session_start();

if(!isset($_SESSION['login'])){
    header('Location: ../../../Auth/login.php');
    die();
}

require_once '..\..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoCustomerRepository.php';
use Mohamed\ClassicModels\Customers\PDOCustomerRepository;
require_once "../../customer.php";
use Mohamed\ClassicModels\Customers\Customer;

$config = require_once "../../../config.php";

try{
    $factory = new factoryConnection($config);
    $repository = new PDOCustomerRepository($factory->get());

    $customer = new Customer(null, '', '', '', '', '', '', '', '', '', '', null, null);

    $employees = $repository->getEmployees();

    require "../../Views/formCustomer.php";

}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>