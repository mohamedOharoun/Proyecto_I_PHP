<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="public/styleIndex.css">
    <title>HOME</title>
</head>
<body>

    <?php
        require_once 'public/menu3.php'
    ?>

    <h1>Mohamed O. Haroun Zarkik</h1>

    <div id="datos">
        <div id="ciclo">
            <p>Desarrollo</p>
            <p>Aplicaciones</p>
            <p>Web</p>
        </div>

        <div id="proyecto">
            <p>Proyecto</p>
            <p>DSW</p>
            <p>Classic Models</p>
        </div>

        <div id="centro">
            <p>CIFP</p>
            <p>Villa</p>
            <p>Agüimes</p>
        </div>
    </div>

    <button><a href="Auth/login.php">SIGN IN</a></button>

    <?php
        require_once 'public/footer.html';
    ?>
</body>
</html>