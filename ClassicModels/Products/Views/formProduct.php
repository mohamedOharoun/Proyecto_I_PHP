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
    <title>Edit Product</title>
</head>
<body>
    <?php if (isset($errores) && count($errores) > 0): ?>
        <p>Existen errores:</p>
        <?php foreach ($errores as $error): ?>
            <li><?=$error?></li>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php require_once('../../../public/menu.php')?>

    <h1>Products Form</h1>

    <form action="../Others/saveProduct_controller.php" method="POST">
        <p>
            <label for="code">Product Code</label>
            <br>
            <input name="code" value="<?=$product->code?>" <?=$product->code !== '' ? 'readonly' : ''?>>
        </p>
        
        <p>
            <label for="name">Name</label>
            <br>
            <input type="text" name="name" id="name" value="<?=$product->name?>">
        </p>

        <p>
            <label for="scale">Scale</label>
            <br>
            <input type="text" name="scale" id="scale" pattern="^\d+:\d+$" value="<?=$product->scale?>">
        </p>

        <p>
            <label for="vendor">Vendor</label>
            <br>
            <input type="text" name="vendor" id="vendor" value="<?=$product->vendor?>">
        </p>

        <p>
            <label for="description">Description</label>
            <br>
            <textarea name="description" id="description" cols="30" rows="10"><?=$product->description?></textarea>
        </p>

        <p>
            <label for="stock">Quantity in Stock</label>
            <br>
            <input type="number" name="stock" id="stock" value="<?=$product->stock?>">
        </p>

        <p>
            <label for="price">Retail Price</label>
            <br>
            <input type="number" name="price" id="price" value="<?=$product->price?>">
        </p>

        <p>
            <label for="msrp">MSRP</label>
            <br>
            <input type="number" name="msrp" id="msrp" value="<?=$product->msrp?>">
        </p>

        <p>
            <label for="line">Product Line</label>
            <br>
            <select name="line" id="line">
                <?php foreach($lines as $line): ?>
                    <option value="<?=$line['productLine']?>"
                        <?=$product->line==$line['productLine'] ? 'selected' : ''?>>
                    <?=$line['productLine']?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        
        <input type="hidden" name="update" value="<?=$update?>">
        <input type="submit" value="Save">
    </form>

    <?php require_once('../../../public/footer.html')?>
</body>
</html>