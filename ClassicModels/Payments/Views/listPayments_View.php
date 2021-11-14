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
</body>
</html>