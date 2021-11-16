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
<head>
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


    <form action="newControllerStep2.php" method="post">
        <input type="hidden" name="customerNumber" value="<?=$customerNumber?>">
        <input type="hidden" name="customerName" value="<?=$customerName?>">

    <fieldset>
        <legend>Orden</legend>
        <p>cliente: <?=$customerName?></p>

        <p>Orderdate: <input type="date" name="orderDate" value="<?=$orderDate?>"></p>
        <p>requiredDate: <input type="date" name="requiredDate" value="<?=$requiredDate?>"></p>
        <p>shippedDate: <input type="date" name="shippedDate" value="<?=$shippedDate?>"></p>

            <ol>
                <?php foreach($orderDetails as $i=>$orderDetail): ?>
                    <li>
                        <input type="number" 
                           name="orderDetails[<?=$i?>][quantityOrdered]" 
                           id="id<?=$orderDetails[$i]?>"
                           value="<?=$orderDetails[$i]['quantityOrdered']?>">
                        <label for="idorderDetail<?=$i?>"><?=$orderDetails[$i]['productName']?> - price <?=$orderDetails[$i]['priceEach']?></label>
                        <input type="hidden"  
                           name="orderDetails[<?=$i?>][productCode]" 
                           value="<?=$orderDetails[$i]['productCode']?>" >
                        <input type="hidden"  
                           name="orderDetails[<?=$i?>][productName]" 
                           value="<?=$orderDetails[$i]['productName']?>" >
                        <input type="hidden"  
                           name="orderDetails[<?=$i?>][priceEach]" 
                           value="<?=$orderDetails[$i]['priceEach']?>" >
                 </li>
                 
                <?php endforeach; ?>
            </ol>
            <input type="submit" name="save" value="guardar">
       
    </fieldset>

    <fieldset>
        <legend>Seleccionar productos</legend>
        <input type="text" name="search" value="<?=$search?>"">
        <input type="submit" name="findProduct" value="buscar">
   
        <ol>
            <?php foreach($products as $product): ?>
                <li>
                    <input type="checkbox" name="productCode[]" id="id<?=$product["code"]?>" value="<?=$product["code"]?>">
                    <label for="id<?=$product["name"]?>"><?=$product["name"]?></label>
                </li>
            <?php endforeach; ?>
        </ol>
      
        <input type="submit" name="addOrderDetail" value="añadir">
    </fieldset>
   
       
    </form>
</body>
</html>