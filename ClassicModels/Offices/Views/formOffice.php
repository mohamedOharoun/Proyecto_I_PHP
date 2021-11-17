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
    <title>Offices Form Edit</title>
</head>
<body>
    <?php if (isset($errores) && count($errores) < 0): ?>
        <p>Existen errores:</p>
        <?php foreach ($errores as $error): ?>
            <li><?=$error?></li>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php require_once('../../../public/menu.php')?>

    <h1>Offices Form</h1>

    <form action="saveOffice_controller.php" method="POST">
        <input type="hidden" name="code" value="<?=$office->code?>">
        <p>
            <label for="city">City</label>
            <br>
            <input type="text" name="city" id="city" value="<?=$office->city?>">
        </p>
        <p>
            <label for="state">State</label>
            <br>
            <input type="text" name="state" id="state" value="<?=$office->state?>">
        </p>
        
        <p>
            <label for="country">Country</label>
            <br>
            <input type="text" name="country" id="country" value="<?=$office->country?>">            
        </p>

        <p>
            <label for="postalCode">Postal Code</label>
            <br>
            <input type="text" name="postalCode" id="postalCode" value="<?=$office->postalCode?>">
        </p>     
           

        <p>
            <label for="territory">Territory</label>
            <br>
            <input type="text" name="territory" id="territory" value="<?=$office->territory?>">
        </p>    
           
        <p>
            <label for="phone">Phone</label>
            <br>
            <input type="text" name="phone" id="phone" value="<?=$office->phone?>">
        </p>
            
        <p>
            <label for="addressLine1">1 Address</label>
            <br>
            <input type="text" name="addressLine1" id="addressLine1" value="<?=$office->addressLine1?>">
        </p>  
        
        <p>
            <label for="addressLine2">2 Address</label>
            <br>
            <input type="text" name="addressLine2" id="addressLine2" value="<?=$office->addressLine2?>">
        </p>
            
        <input type="submit" value="Save">
    </form>

    <?php require_once('../../../public/footer.html')?>
</body>
</html>