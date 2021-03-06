<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Offices\Controllers\Create;

require_once '../../../public/sessionController3.php';

require_once '..\..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoOfficeRepository.php';
use Mohamed\ClassicModels\Offices\PDOOfficeRepository;

$config = require_once "../../../config.php";

try{
    $factory = new factoryConnection($config);
    $repository = new PDOOfficeRepository($factory->get());
    require "../../Views/newOffice_view.php";
}catch(PDOException $e){
    print "¡Error!: " . $e->getMessage() . "<br>";
    die();
}finally{
    $repository = null;
}
?>