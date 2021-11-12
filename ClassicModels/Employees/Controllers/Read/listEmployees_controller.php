<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Employees\Controllers\Read;

require_once '..\..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoEmployeeRepository.php';
use Mohamed\ClassicModels\Employees\PDOEmployeeRepository;

$config = require_once '../../../config.php';

try{
    $factory = new FactoryConnection($config);
    $repository = new PDOEmployeeRepository($factory->get());
    $employees = $repository->getAll();
    require '../../Views/listEmployees_view.php';
}catch(PDOException $e){
    print '¡Error!: ' . $e->getMessage() . '<br/>';
    die();
}finally{
    $repository = null;
}
?>