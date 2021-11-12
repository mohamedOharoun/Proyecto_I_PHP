<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Offices\Controllers\Delete;

require_once '..\..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoOfficeRepository.php';
use Mohamed\ClassicModels\Offices\PDOOfficeRepository;
require_once "../../office.php";
use Mohamed\ClassicModels\Offices\Office;

$config = require_once "../../../config.php";

try{
    $factory = new factoryConnection($config);
    $repository = new PDOOfficeRepository($factory->get());
    $offices = $repository->getAll();
    require "../../Views/deleteOffice_View.php";
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>