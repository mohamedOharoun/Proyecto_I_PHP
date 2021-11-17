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
    <title>Customers List</title>
</head>
<body>
    <?php require_once('../../../public/menu.php')?>

    <div id="title"><h1>CUSTOMERS' TABLE</h1></div>

    <div id="btn-area">
        <button><a href="../Create/newCustomer_controller.php">New Customer</a></button>
    </div>
    <table>
        <tr>
            <th>Number</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Phone</th>
            <th>First AddressLine</th>
            <th>Second AdressLine</th>
            <th>City</th>
            <th>State</th>
            <th>Postal Code</th>
            <th>Country</th>
            <th>Employee Number</th>
            <th>Credit Limit</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        <?php foreach($customers as $customer): ?>
        <tr>
            <td><?=$customer['customerNumber']?></td>
            <td><?=$customer['customerName']?></td>
            <td><?=$customer['contactLastName']?></td>
            <td><?=$customer['contactFirstName']?></td>
            <td><?=$customer['phone']?></td>
            <td><?=$customer['addressLine1']?></td>
            <td><?=isset($customer['addressLine2']) ? $customer['addressLine2'] : 'NONE'?></td>
            <td><?=$customer['city']?></td>
            <td><?=$customer['state']?></td>
            <td><?=$customer['postalCode']?></td>
            <td><?=$customer['country']?></td>
            <td><?=$customer['salesRepEmployeeNumber']?></td>
            <td><?=$customer['creditLimit']?></td>
            <td><a href="../Update/editCustomer_controller.php?number=<?=$customer['customerNumber']?>">Edit</a></td>
            <td><a href="../Delete/deleteCustomer_controller.php?number=<?=$customer['customerNumber']?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php require_once('../../../public/footer.html')?>
</body>
</html>