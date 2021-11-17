<?php
    if($_SESSION['login'] != 2){
        require_once '../../public/sessionView.php';
    }else{
        require_once '../../../public/sessionView.php';
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/style.css">
    <?php
        require_once '../../../public/tableFontStyle.php';
    ?>
    <title>Product Lines List</title>
</head>
<body>
    <?php require_once('../../../public/menu.php')?>

    <div id="title"><h1>PRODUCT LINES' TABLE</h1></div>

    <div id="btn-area">
        <button><a href="../Create/newProductLine_controller.php">New Product Line</a></button>
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
            <td><a href="../Update/editProductLine_controller.php?name=<?=$productLine['name']?>">Edit</a></td>
            <td><a href="../Delete/deleteProductLine_controller.php?name=<?=$productLine['name']?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php require_once('../../../public/footer.html')?>
</body>
</html>