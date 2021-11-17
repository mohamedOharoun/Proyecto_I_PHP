<?php
    require_once '../../public/sessionView.php';
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/style.css">
    <link rel="stylesheet" href="../../public/styleOrder.css">
    <title>Order Form</title>
</head>
<body>
    <?php if (isset($errores) && count($errores) > 0): ?>
        <p>Existen errores:</p>
        <?php foreach ($errores as $error): ?>
            <li><?=$error?></li>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php require_once('../../public/menu2.php')?>

    <h1>Select a client</h1>
 
    <form action="newControllerStep1.php" method="post" id="form1">
        <div id="form1">
            <input type="text" name="search" value="<?=$search?>">
            <input type="submit" value="Search">
        </div>
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
      
        <input type="submit" value="Next">
    </form>

    <?php require_once('../../public/footer.html')?>
</body>
</html>