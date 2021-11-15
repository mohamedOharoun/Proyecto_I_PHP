<?php
session_start();

if(!isset($_SESSION['login'])){
    header('Location: ../../Auth/login.php');
}
?>
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
            <th>Order Number</th>
            <th>Customer</th>
            <th>Order Date</th>
            <th>Required Date</th>
            <th>Shippment Date</th>
            <th>Status</th>
            <th>Comments</th>
        </tr>
        <?php foreach($orders as $order): ?>
        <tr>
            <td><?=$order['orderNumber']?></td>
            <td><?=$order['customerName']?></td>
            <td><?=$order['orderDate']?></td>
            <td><?=$order['requiredDate']?></td>
            <td><?=$order['shippedDate']?></td>
            <td><?=$order['status']?></td>
            <td><?=$order['comments']?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <button><a href="newControllerStep1.php">New Order</a></button>
</body>
</html>