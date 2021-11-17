<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Offices\Controllers\Create;

require_once '../../../public/sessionController3.php';

require_once '../../../factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '../../pdoOfficeRepository.php';
use Mohamed\ClassicModels\Offices\PDOOfficeRepository;
require_once "../../office.php";
use Mohamed\ClassicModels\Offices\office;

$office = new Office($_POST['code'], $_POST['city'], $_POST['state'], $_POST['country'], $_POST['postalCode'], $_POST['territory'],$_POST['phone'], $_POST['addressLine1'],$_POST['addressLine2']);

$errores = $office->validate();
if(count($errores) > 0){
    require "../../Views/formOffice.php";
    die();
}

$config = require_once "../../../config.php";
try{
    $factory = new factoryConnection($config);
    $repository = new PDOOfficeRepository($factory->get());
    $repository->create($office);

    header("Location: ../Read/listOffices_controller.php");
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>