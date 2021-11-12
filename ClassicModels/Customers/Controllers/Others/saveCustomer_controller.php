<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Customers\Controllers\Update;

require_once "../../../factoryConnection.php";
use Mohamed\ClassicModels\FactoryConnection;
require_once "../../pdoCustomerRepository.php";
use Mohamed\ClassicModels\Customers\PDOCustomerRepository;
require_once "../../Customer.php";
use Mohamed\ClassicModels\Customers\Customer;

$number = intval($_POST['number']);
$employee = intval($_POST['employee']);
$credit = floatval($_POST['credit']);

$customer = new Customer($number !=0 ? $number : null, $_POST['name'], $_POST['lastName'], $_POST['firstName'], $_POST['phone'], $_POST['addressLine1'], $_POST['addressLine2'], $_POST['city'], $_POST['state'], $_POST['postalCode'], $_POST['country'], $employee != 0 ? $employee : null,  $credit != 0 ? $credit : null);

$errores = $customer->validate();
if(count($errores) > 0){
    require "../../Views/formCustomer.php";
    die();
}

$config = require_once "../../../config.php";
try{
    $factory = new factoryConnection($config);
    $repository = new PDOCustomerRepository($factory->get());

    if(isset($customer->number)){
        $repository->update($customer);
    }else{
        $repository->insert($customer);
    }

    header("Location: ../Read/listCustomers_controller.php");
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>