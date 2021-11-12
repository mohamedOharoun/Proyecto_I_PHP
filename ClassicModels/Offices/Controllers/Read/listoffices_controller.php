<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Offices\Controllers\Read;

require_once '..\..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoOfficeRepository.php';
use Mohamed\ClassicModels\Offices\PDOOfficeRepository;

$config = require_once '../../../config.php';

try{
    $factory = new FactoryConnection($config);
    $repository = new PDOOfficeRepository($factory->get());
    $offices = $repository->getAll();
    require '../../Views/listoffices_view.php';
}catch(PDOException $e){
    print '¡Error!: ' . $e->getMessage() . '<br/>';
    die();
}finally{
    $repository = null;
}
?>