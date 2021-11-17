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
    <title>Employees List</title>
</head>
<body>
    <?php require_once('../../../public/menu.php')?>

    <div id="title"><h1>EMPLOYEES' TABLE</h1></div>

    <div id="btn-area">
        <button><a href="../Create/newEmployee_controller.php">New Employee</a></button>
    </div>

    <table>
        <tr>
            <th>Number</th>
            <th>Job Title</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Extension</th>
            <th>Email</th>
            <th>Reports To</th>
            <th>Office Code</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach($employees as $employee): ?>
        <tr>
            <td><?=$employee['employeeNumber']?></td>
            <td><?=$employee['jobTitle']?></td>
            <td><?=$employee['lastName']?></td>
            <td><?=$employee['firstName']?></td>
            <td><?=$employee['extension']?></td>
            <td><?=$employee['email']?></td>
            <td><?=$employee['reportsTo']?></td>
            <td><?=$employee['officeCode'] . '. ' . $employee['officeCity']?></td>
            <td><a href="../Update/editEmployee_controller.php?number=<?=$employee['employeeNumber']?>">Edit</a></td>
            <td><a href="../Delete/deleteEmployee_controller.php?number=<?=$employee['employeeNumber']?>">Delete</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php require_once('../../../public/footer.html')?>
</body>
</html>