<?php
    require_once '../../public/sessionView.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/style.css">
    <?php
        require_once '../../public/tableFontStyle.php';
    ?>
    <title>Payments List</title>
</head>
<body>
    <?php require_once('../../public/menu2.php')?>

    <div id="title"><h1>PAYMENTS' TABLE</h1></div>

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