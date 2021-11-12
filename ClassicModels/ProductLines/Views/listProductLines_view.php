<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>ProductLine</th>
            <th>TextDescription</th>
            <th>HTMLDescription</th>
            <th>Image</th>
        </tr>
        <?php foreach($productLines as $productLine): ?>
        <tr>
            <td><?=$productLine['name']?></td>
            <td><?=$productLine['textDescription']?></td>
            <td><?=$productLine['htmlDescription']?></td>
            <td><img src="showimage.php?name=<?=urlencode($productLine['name'])?>" width="32px"></td>
            <td><button><a href="../Update/editProductLine_controller.php?name=<?=$productLine['name']?>">Editar</a></button></td>
            <td><button><a href="../Delete/deleteProductLine_controller.php?name=<?=$productLine['name']?>">Eliminar</a></button></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    <button><a style="text-decoration:none; color:black;" href="../Create/newProductLine_controller.php">Nuevo</a></button>
</body>
</html>