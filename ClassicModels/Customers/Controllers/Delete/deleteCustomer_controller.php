<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Customers\Controllers\Delete;

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
    $customer = $repository->delete(intval($_GET['number']));
    header("Location: ../Read/listCustomers_controller.php");
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>