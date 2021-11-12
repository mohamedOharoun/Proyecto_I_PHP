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
            <th>Number</th>
            <th>Job Title</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Extension</th>
            <th>Email</th>
            <th>Reports To</th>
            <th>Office Code</th>
            <th>Editar</th>
            <th>Eliminar</th>
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
            <td><a href="../Update/editEmployee_controller.php?number=<?=$employee['employeeNumber']?>">Editar</a></td>
            <td><a href="../Delete/deleteEmployee_controller.php?number=<?=$employee['employeeNumber']?>">Eliminar</a></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <button><a href="../Create/newEmployee_controller.php">Nuevo</a></button>
</body>
</html>