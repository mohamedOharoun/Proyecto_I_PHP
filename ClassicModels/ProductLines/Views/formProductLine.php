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
    <title>Product Line Edit</title>
</head>
<body>
    <?php if (isset($errores) && count($errores) < 0): ?>
        <p>Existen errores:</p>
        <?php foreach ($errores as $error): ?>
            <li><?=$error?></li>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php require_once('../../../public/menu.php')?>

    <h1>Product Lines Form</h1>

    <form action="../Others/saveProductLine_controller.php" method="POST" enctype="multipart/form-data">
        <p>
            <label for="name">Name</label>
            <br>
            <input type="text" name="name" id="name" value="<?=$productLine->name?>" <?=$productLine->name != '' ? 'readonly' : '' ?>>
        </p>
        <p>
            <label for="textDescription">Text Description</label>
            <br>
            <textarea type="text" name="textDescription" id="textDescription" value="<?=$productLine->textDescription?>"><?=$productLine->textDescription?></textarea>
        </p>
        
        <p>
            <label for="htmlDescription">HTML Description</label>
            <br>
            <textarea type="text" name="htmlDescription" id="htmlDescription"><?=$productLine->htmlDescription?></textarea>       
        </p>

        <p>
            <label for="image">Image</label>
            <br>
            <img src="../Read/showimage.php?name=<?=$productLine->name?>" width="200px">
            <input type="file" name="image" id="image" accept=".jpg, .png">
        </p>
        
        <input type="hidden" name="currentName" value="<?=$productLine->name?>">
            
        <input type="submit" value="Save">
    </form>

    <?php require_once('../../../public/footer.html')?>
</body>
</html>