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
    <link rel="stylesheet" href="../../../public/style.css">
    <title>Employee Form</title>
</head>
<body>
    <?php if (isset($errores) && count($errores) > 0): ?>
        <p>Existen errores:</p>
        <?php foreach ($errores as $error): ?>
            <li><?=$error?></li>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php require_once('../../../public/menu.php')?>

    <h1>Employees Form</h1>

    <form action="../Others/saveEmployee_controller.php" method="POST">
        <p <?=!isset($employee->number) ? 'style="display: none;"' : ""?>>
            <label for="number">Employee Number</label>
            <br>
            <input name="number" value="<?=$employee->number?>" readonly>
        </p>
        
        <p>
            <label for="jobTitle">Job Title</label>
            <br>
            <input type="text" name="jobTitle" id="jobTitle" value="<?=$employee->jobTitle?>">
        </p>

        <p>
            <label for="lastName">Last Name</label>
            <br>
            <input type="text" name="lastName" id="lastName" value="<?=$employee->lastName?>">
        </p>

        <p>
            <label for="firstName">First Name</label>
            <br>
            <input type="text" name="firstName" id="firstName" value="<?=$employee->firstName?>">
        </p>

        <p>
            <label for="extension">Extension</label>
            <br>
            <input type="text" name="extension" id="extension" value="<?=$employee->extension?>">
        </p>

        <p>
            <label for="email">Email</label>
            <br>
            <input type="text" name="email" id="email" value="<?=$employee->email?>">
        </p>

        <p>
            <label for="officeCode">Office Code</label>
            <br>
            <select name="officeCode" id="officeCode">
                <?php foreach($offices as $office): ?>
                    <option value="<?=$office['officeCode']?>"
                        <?=$employee->officeCode==$office['officeCode'] ? 'selected' : ''?>>
                    <?=$office['officeCode'] . '-' . $office['city']?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>
        
        <p>
            <label for="reportsTo">Reports to</label>
            <br>
            <select name="reportsTo" id="reportsTo">
                <?php foreach($employees as $emp): ?>
                    <option value="<?=$emp['employeeNumber']?>"
                        <?=$employee->reportsTo==$emp['employeeNumber'] ? 'selected' : ''?>>
                    <?=$emp['employeeNumber'] . '-' . $emp['lastName'] . ' ' . $emp['firstName']?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p> 
            
        <input type="submit" value="Guardar">
    </form>

    <?php require_once('../../../public/footer.html')?>
</body>
</html>