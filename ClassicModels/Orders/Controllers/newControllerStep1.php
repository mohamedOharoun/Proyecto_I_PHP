<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Oders\Controllers;

require_once "../PDOOrderRepository.php";
use Mohamed\ClassicModels\Orders\PDOOrderRepository as Repository;
require_once "../../factoryConnection.php";
use Mohamed\ClassicModels\FactoryConnection;

$config = require "../../config.php";
try { 
    $factory = new FactoryConnection($config);
    $repository = new Repository($factory->get());

    $search = array_key_exists("search", $_POST)? $_POST["search"]: null;
    
    $customers = $repository->find($search);
    require "../Views/formSelectCustomer.php";
} catch (\PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
} finally {
    $repository = null;
}

