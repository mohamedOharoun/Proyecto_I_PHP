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

    <h1>Order Details</h1>
    <form action="newControllerStep2.php" method="post">
        <input type="hidden" name="customerNumber" value="<?=$customerNumber?>">
        <input type="hidden" name="customerName" value="<?=$customerName?>">

    <fieldset id="fieldset1">
        <legend>Order</legend>
        <p>Client: <?=$customerName?></p>

        <p>Order Date: <input type="date" name="orderDate" value="<?=$orderDate?>"></p>
        <p>Required Date: <input type="date" name="requiredDate" value="<?=$requiredDate?>"></p>
        <p>Shipped Date: <input type="date" name="shippedDate" value="<?=$shippedDate?>"></p>

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
            <input type="submit" name="save" value="Save">
       
    </fieldset>

    <fieldset>
        <legend>Select Products</legend>
        <div id="form1">
            <input type="text" name="search" value="<?=$search?>">
            <input type="submit" name="findProduct" value="Search">
        </div>
        
   
        <ol>
            <?php foreach($products as $product): ?>
                <li>
                    <input type="checkbox" name="productCode[]" id="id<?=$product["code"]?>" value="<?=$product["code"]?>">
                    <label for="id<?=$product["name"]?>"><?=$product["name"]?></label>
                </li>
            <?php endforeach; ?>
        </ol>
      
        <input type="submit" name="addOrderDetail" value="Add">
    </fieldset>
   
       
    </form>

    <?php require_once('../../public/footer.html')?>
</body>
</html>