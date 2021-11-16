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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/style.css">
</head>
<body>
    <?php require_once('../../public/menu2.php')?>

    <div id="title"><h1>ORDERS' TABLE</h1></div>

    <table>
        <tr>
            <th>Customer Number</th>
            <th>Check Number</th>
            <th>Payment Date</th>
            <th>Amount</th>
        </tr>
        <?php foreach($payments as $payment): ?>
        <tr>
            <td><?=$payment['customerNumber']?></td>
            <td><?=$payment['checkNumber']?></td>
            <td><?=$payment['paymentDate']?></td>
            <td><?=$payment['amount']?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php require_once('../../public/footer.html')?>
</body>
</html>