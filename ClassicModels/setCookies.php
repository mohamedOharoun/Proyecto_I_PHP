<?php declare(strict_types=1);

setcookie("size", $_POST["size"], 0, "/", "", false, true);

header("location: Products/Controllers/Read/listProducts_controller.php");
exit();
?>