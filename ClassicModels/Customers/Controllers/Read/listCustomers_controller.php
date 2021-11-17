<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Customers\Controllers\Read;

require_once '../../../public/sessionController3.php';

require_once '..\..\..\factoryConnection.php';
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoCustomerRepository.php';
use Mohamed\ClassicModels\Customers\PDOCustomerRepository;

$config = require_once '../../../config.php';

try{
    $factory = new FactoryConnection($config);
    $repository = new PDOCustomerRepository($factory->get());
    $customers = $repository->getAll();
    require '../../Views/listCustomers_view.php';
}catch(PDOException $e){
    print '¡Error!: ' . $e->getMessage() . '<br/>';
    die();
}finally{
    $repository = null;
}
?>