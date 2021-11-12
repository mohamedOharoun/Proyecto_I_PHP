<?php

namespace Mohamed\ClassicModels\Offices\Controllers\Read;

require_once '..\..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoOfficeRepository.php';
use Mohamed\ClassicModels\Offices\PDOOfficeRepository;


$config = require_once "../../../config.php";

try{
    $factory = new factoryConnection($config);
    $repository = new PDOOfficeRepository($factory->get());
    $office = $repository->get($_GET['code']);

    if($office == null){
        print "Error: No existe oficina con el código '{$_GET['code']}'";
        die();
    }

    require "../../Views/showOffice_view.php";
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>