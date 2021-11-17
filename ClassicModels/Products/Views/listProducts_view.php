<?php
    if($_SESSION['login'] != 2){
        require_once '../../public/sessionView.php';
    }else{
        require_once '../../../public/sessionView.php';
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/style.css">
    <?php
        require_once '../../../public/tableFontStyle.php';
    ?>
    <title>Products List</title>
</head>
<body>
    <?php require_once('../../../public/menu.php')?>

    <div id="title"><h1>PRODUCTS' TABLE</h1></div>

    <div id="btn-area">
        <button><a href="../Create/newProduct_controller.php">New Product</a></button>
    </div>

    <table>
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Product Line</th>
            <th>Scale</th>
            <th>Vendor</th>
            <th>Description</th>
            <th>Quantity in Stock</th>
            <th>Price</th>
            <th>MSRP</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach($products as $product): ?>
        <tr>
            <td><?=$product['productCode']?></td>
            <td><?=$product['productName']?></td>
            <td><?=$product['productLine']?></td>
            <td><?=$product['productScale']?></td>
            <td><?=$product['productVendor']?></td>
            <td><?=$product['productDescription']?></td>
            <td><?=$product['quantityInStock']?></td>
            <td><?=$product['buyPrice']?></td>
            <td><?=$product['MSRP']?></td>
            <td><a href="../Update/editProduct_controller.php?code=<?=$product['productCode']?>">Edit</a></td>
            <td><a href="../Delete/deleteProduct_controller.php?code=<?=$product['productCode']?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    
    
    

    <?php require_once('../../../public/footer.html')?>
</body>
</html>