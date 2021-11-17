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
    <title>Offices List</title>
</head>
<body>
    <?php require_once('../../../public/menu.php')?>

    <div id="title"><h1>OFFICES' TABLE</h1></div>

    <div id="btn-area">
        <button><a href="../Create/newOffice_controller.php">New Office</a></button>
    </div>
    
    <table>
        <tr>
            <th>Code</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Postal Code</th>
            <th>Territoty</th>
            <th>Telephone</th>
            <th>Direction 1</th>
            <th>Direction 2</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach($offices as $office): ?>
        <tr>
            <td><?=$office['officeCode']?></td>
            <td><?=$office['city']?></td>
            <td><?=$office['state']?></td>
            <td><?=$office['country']?></td>
            <td><?=$office['postalCode']?></td>
            <td><?=$office['territory']?></td>
            <td><?=$office['phone']?></td>
            <td><?=$office['addressLine1']?></td>
            <td><?=$office['addressLine2']?></td>
            <td><a href="../Update/editOffice_controller.php?code=<?=$office['officeCode']?>">Edit</a></td>
            <td><a href="../Delete/deleteOffice_controller.php?code=<?=$office['officeCode']?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php require_once('../../../public/footer.html')?>
</body>
</body>
</html>