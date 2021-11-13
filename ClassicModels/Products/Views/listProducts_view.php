<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        button a{
            text-decoration: none;
            color: black;
        }

        td{
            text-align: center;
        }
    </style>
</head>
<body>
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
            <td><a href="../Update/editProduct_controller.php?code=<?=$product['productCode']?>">Editar</a></td>
            <td><a href="../Delete/deleteProduct_controller.php?code=<?=$product['productCode']?>">Eliminar</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <button><a href="../Create/newProduct_controller.php">Nuevo</a></button>
</body>
</html>