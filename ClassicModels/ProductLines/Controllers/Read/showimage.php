<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\ProductLines\Controllers\Read;
require_once "../../ProductLine.php";
use Mohamed\ClassicModels\ProductLines\ProductLine;
require_once "../../../factoryConnection.php";
use Mohamed\ClassicModels\FactoryConnection;
require_once '..\..\pdoProductLineRepository.php';
use Mohamed\ClassicModels\ProductLines\PDOProductLineRepository;

$config = require_once "../../../config.php";

try{
    $factory = new FactoryConnection($config);
    $repository = new PDOProductLineRepository($factory->get());

    $image = $repository->getImage($_GET['name']);

    if(!is_null($image)){
        echo $image;
    }else{
        $file_out = "default.png";
        $image_info = getimagesize($file_out);

        header('Content-Type: ' . $image_info['mime']);

        header('Content-Length: ' . filesize($file_out));

        readfile($file_out);
    }
}catch(PDOException $e){
    print '¡Error!: ' . $e->getMessage() . '<br>';
}finally{
    $repository = null;
}

?>
