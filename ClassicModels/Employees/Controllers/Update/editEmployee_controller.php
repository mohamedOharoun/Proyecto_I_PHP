<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Employees\Controllers\Update;
session_start();

if(!isset($_SESSION['login'])){
    header('Location: ../../../Auth/login.php');
    die();
}

require_once "../../../factoryConnection.php";
use Mohamed\ClassicModels\FactoryConnection;
require_once "../../pdoEmployeeRepository.php";
use Mohamed\ClassicModels\Employees\PDOEmployeeRepository;
require_once "../../employee.php";
use Mohamed\ClassicModels\Employees\Employee;

$config = require_once "../../../config.php";

try{
    $factory = new factoryConnection($config);
    $repository = new PDOEmployeeRepository($factory->get());
    $employee = $repository->get(intval($_GET['number']));
    $offices = $repository->getOfficeCodesCities();
    $employees = $repository->getNumbersNames();
    require "../../Views/formEmployee.php";
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>