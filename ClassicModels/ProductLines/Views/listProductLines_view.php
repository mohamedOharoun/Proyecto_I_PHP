<?php
if(session_status() != 2){
    session_start();
}


if(!isset($_SESSION['login'])){
    header('Location: ../../Auth/login.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/style.css">
    <title>Document</title>
</head>
<body>
    <?php require_once('../../../public/menu.php')?>

    <div id="title"><h1>TABLE OF PRODUCT LINES</h1></div>

    <div id="btn-area">
        <button><a style="text-decoration:none; color:black;" href="../Create/newProductLine_controller.php">New Product Line</a></button>
    </div>
    <table>
        <tr>
            <th>ProductLine</th>
            <th>TextDescription</th>
            <th>HTMLDescription</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach($productLines as $productLine): ?>
        <tr>
            <td><?=$productLine['name']?></td>
            <td><?=$productLine['textDescription']?></td>
            <td><?=$productLine['htmlDescription']?></td>
            <td><img src="showimage.php?name=<?=urlencode($productLine['name'])?>" width="32px"></td>
            <td><a href="../Update/editProductLine_controller.php?name=<?=$productLine['name']?>">Editar</a></td>
            <td><a href="../Delete/deleteProductLine_controller.php?name=<?=$productLine['name']?>">Eliminar</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php require_once('../../../public/footer.html')?>
</body>
</html>