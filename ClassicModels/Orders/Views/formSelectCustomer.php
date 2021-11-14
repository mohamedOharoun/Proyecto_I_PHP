
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order</title>
</head>
<body>
    <?php if (isset($errores) && count($errores) > 0): ?>
        <p>Existen errores:</p>
        <?php foreach ($errores as $error): ?>
            <li><?=$error?></li>
        <?php endforeach; ?>
    <?php endif; ?>

    <h1>Seleccionar un cliente</h1>
 
    <form action="newControllerStep1.php" method="post">
        <input type="text" name="search" value="<?=$search?>">
        <input type="submit" value="buscar">
    </form>
 
    <form action="newControllerStep2.php" method="post">
        <ol>
            <?php foreach($customers as $customer): ?>
                <li>
                    <input type="radio" name="customerNumber" id="id<?=$customer["number"]?>" value="<?=$customer["number"]?>" required>
                    <label for="id<?=$customer["number"]?>"><?=$customer["name"]?></label>
                </li>
            <?php endforeach; ?>
        </ol>
      
        <input type="submit" value="siguiente">
    </form>
</body>
</html>