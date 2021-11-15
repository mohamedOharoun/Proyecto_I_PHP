<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
        if(isset($_GET['err'])){
            echo 'Credenciales incorrectas';
        }
    ?>

    <h1>LOGIN</h1>
    <form action="auth.php" method="POST">
        <label for="nick">Login</label>
        <input type="text" name="nick" required>
        <br>
        <label for="passw">Contraseña</label>
        <input type="password" name="passw" required>
        <br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>