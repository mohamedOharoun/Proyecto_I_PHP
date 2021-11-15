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

    <form action="saveOffice_controller.php" method="POST">
        <input type="hidden" name="code" value="<?=$office->code?>">
        <p>
            <label for="city">Ciudad</label>
            <input type="text" name="city" id="city" value="<?=$office->city?>">
        </p>
        <p>
            <label for="state">Estado</label>
            <input type="text" name="state" id="state" value="<?=$office->state?>">
        </p>
        
        <p>
            <label for="country">País</label>
            <input type="text" name="country" id="country" value="<?=$office->country?>">            
        </p>

        <p>
            <label for="postalCode">Código Postal</label>
            <input type="text" name="postalCode" id="postalCode" value="<?=$office->postalCode?>">
        </p>     
           

        <p>
            <label for="territory">Territory</label>
            <input type="text" name="territory" id="territory" value="<?=$office->territory?>">
        </p>    
           
        <p>
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone" value="<?=$office->phone?>">
        </p>
            
        <p>
        <label for="addressLine1">Dirección 1</label>
            <input type="text" name="addressLine1" id="addressLine1" value="<?=$office->addressLine1?>">
        </p>  
        
        <p>
            <label for="addressLine2">Dirección 2</label>
            <input type="text" name="addressLine2" id="addressLine2" value="<?=$office->addressLine2?>">
        </p>
            
        <input type="submit" value="Save">
    </form>
</body>
</html>