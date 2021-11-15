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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($errores) && count($errores) < 0): ?>
        <p>Existen errores:</p>
        <?php foreach ($errores as $error): ?>
            <li><?=$error?></li>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="../Others/saveEmployee_controller.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="currentName" value="<?=$currentName?>">
        <p>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="<?=$productLine->name?>">
        </p>
        <p>
            <label for="textDescription">Text Description</label>
            <textarea type="text" name="textDescription" id="textDescription" value="<?=$productLine->textDescription?>"><?=$productLine->textDescription?></textarea>
        </p>
        
        <p>
            <label for="htmlDescription">HTML Description</label>
            <textarea type="text" name="htmlDescription" id="htmlDescription"><?=$productLine->htmlDescription?></textarea>       
        </p>

        <p>
            <img src="showimage.php?name=<?=urlencode($productLine->name)?>" width="200px">
            <label for="image">Imagen</label>
            <input type="file" name="image" id="image">
        </p>     
            
        <input type="submit" value="guardar">
    </form>

    <?php if ($enableDelete): ?>
        <!--<form action="../Delete/deleteProductLine_controller.php" method></form>-->
    <?php endif; ?>
</body>
</html>