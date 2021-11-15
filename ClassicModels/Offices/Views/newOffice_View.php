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
    <title>Document</title>
</head>
<body>
    <?php if (isset($errores) && count($errores) < 0): ?>
        <p>Existen errores:</p>
        <?php foreach ($errores as $error): ?>
            <li><?=$error?></li>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="createOffice_controller.php" method="POST">
    <p>
            <label for="code">Código</label>
            <input type="text" name="code" id="code">
        </p>
        <p>
            <label for="city">Ciudad</label>
            <input type="text" name="city" id="city">
        </p>
        <p>
            <label for="state">Estado</label>
            <input type="text" name="state" id="state">
        </p>
        
        <p>
            <label for="country">País</label>
            <input type="text" name="country" id="country">            
        </p>

        <p>
            <label for="postalCode">Código Postal</label>
            <input type="text" name="postalCode" id="postalCode">
        </p>     
           

        <p>
            <label for="territory">Territory</label>
            <input type="text" name="territory" id="territory">
        </p>    
           
        <p>
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" id="phone">
        </p>
            
        <p>
        <label for="addressLine1">Dirección 1</label>
            <input type="text" name="addressLine1" id="addressLine1">
        </p>  
        
        <p>
            <label for="addressLine2">Dirección 2</label>
            <input type="text" name="addressLine2" id="addressLine2">
        </p>
            
        <input type="submit" value="Save">
    </form>
</body>
</html>