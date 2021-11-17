<?php declare(strict_types=1);

namespace Mohamed\ClassicModels\Employees\Controllers\Create;

require_once '../../../public/sessionController3.php';

require_once "../../ProductLine.php";
use Mohamed\ClassicModels\ProductLines\ProductLine;

$currentName = '';
$enableDelete = strlen($currentName);
$productLine = new ProductLine($currentName, null, null);
require_once '../../Views/formProductLine.php';

?>