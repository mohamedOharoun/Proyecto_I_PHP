<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style2.css">
    <title>Login</title>
</head>
<body>
    <?php
        if(isset($_GET['err'])){
            echo 'Credenciales incorrectas';
        }
    ?>

    <div class="container">
        <h1>LOGIN</h1>
        <form action="auth.php" method="POST">
            <p>
                <label for="nick">User Name</label>
                <br>
                <input type="text" name="nick" required>
            </p>
            <p>
                <label for="passw">Password</label>
                <br>
                <input type="password" name="passw" required>
            </p>
            <input type="submit" value="Log In">
        </form>
    </div>
</body>
</html>