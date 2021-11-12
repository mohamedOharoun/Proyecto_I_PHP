<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Employees\Controllers\Update;

require_once "../../../factoryConnection.php";
use Mohamed\ClassicModels\FactoryConnection;
require_once "../../pdoEmployeeRepository.php";
use Mohamed\ClassicModels\Employees\PDOEmployeeRepository;
require_once "../../Employee.php";
use Mohamed\ClassicModels\Employees\Employee;

$number = intval($_POST['number']);
$reportsTo = intval($_POST['reportsTo']);

$employee = new Employee($number !=0 ? $number : null, $_POST['lastName'], $_POST['firstName'], $_POST['extension'], $_POST['email'], $_POST['officeCode'], $reportsTo != 0 ? $reportsTo : null,  $_POST['jobTitle']);

$errores = $employee->validate();
if(count($errores) > 0){
    require "../../Views/formEmployee.php";
    die();
}

$config = require_once "../../../config.php";
try{
    $factory = new factoryConnection($config);
    $repository = new PDOEmployeeRepository($factory->get());

    if(isset($employee->number)){
        $repository->update($employee);
    }else{
        $repository->insert($employee);
    }

    header("Location: ../Read/listEmployees_controller.php");
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>