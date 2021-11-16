<?php
    require_once 'public/sessionController.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style2.css">
    <title>Preferences</title>
</head>
<body>
    <div class="container">
        <h1>Your Preferences</h1>
        <form action="setCookies.php" method="POST">
            <p>
                <label for="size">Tables' font size</label>
                <br>
                <input type="number" name="size" id="size" min="1" max="32" value="<?= isset($_COOKIE['size']) ? $_COOKIE['size'] : 16?>">
            </p>
            <input type="submit" value="Change Preferences">
        </form>
    </div>
</body>
</html>