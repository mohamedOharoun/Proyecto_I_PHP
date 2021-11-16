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
    <title>Customers Form</title>
</head>
<body>
    <?php if (isset($errores) && count($errores) > 0): ?>
        <p>Existen errores:</p>
        <?php foreach ($errores as $error): ?>
            <li><?=$error?></li>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php require_once('../../../public/menu.php')?>

    <h1>Customers Form</h1>

    <form action="../Others/saveCustomer_controller.php" method="POST">
    <p <?=!isset($employee->number) ? 'style="display: none;"' : ""?>>
            <label for="number">Customer Number</label>
            <br>
            <input name="number" value="<?=$customer->number?>" readonly>
        </p>
        
        <p>
            <label for="name">Customer Name</label>
            <br>
            <input type="text" name="name" id="name" value="<?=$customer->name?>">
        </p>

        <p>
            <label for="lastName">Last Name</label>
            <br>
            <input type="text" name="lastName" id="lastName" value="<?=$customer->lastName?>">
        </p>

        <p>
            <label for="firstName">First Name</label>
            <br>
            <input type="text" name="firstName" id="firstName" value="<?=$customer->firstName?>">
        </p>

        <p>
            <label for="phone">Phone</label>
            <br>
            <input type="text" name="phone" id="phone" value="<?=$customer->phone?>">
        </p>

        <p>
            <label for="addressLine1">Address Line 1</label>
            <br>
            <input type="text" name="addressLine1" id="addressLine1" value="<?=$customer->addressLine1?>">
        </p>

        <p>
            <label for="addressLine2">Address Line 2</label>
            <br>
            <input type="text" name="addressLine2" id="addressLine2" value="<?=$customer->addressLine2?>">
        </p>

        <p>
            <label for="city">City</label>
            <br>
            <input type="text" name="city" id="city" value="<?=$customer->city?>">
        </p>

        <p>
            <label for="state">State</label>
            <br>
            <input type="text" name="state" id="state" value="<?=$customer->state?>">
        </p>

        <p>
            <label for="postalCode">Postal Code</label>
            <br>
            <input type="text" name="postalCode" id="postalCode" value="<?=$customer->postalCode?>">
        </p>

        <p>
            <label for="country">Country</label>
            <br>
            <input type="text" name="country" id="country" value="<?=$customer->country?>">
        </p>

        <p>
            <label for="employee">Sales Representative Employee Number</label>
            <br>
            <select name="employee" id="employee">
                <?php foreach($employees as $employee): ?>
                    <option value="<?=$employee['employeeNumber']?>"
                        <?=$customer->employee==$employee['employeeNumber'] ? 'selected' : ''?>>
                    <?=$employee['employeeNumber']?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="credit">Credit Limit</label>
            <br>
            <input type="number" step="0.01" name="credit" id="credit" value="<?=$customer->credit?>">
        </p>
            
        <input type="submit" value="Save">
    </form>

    <?php require_once('../../../public/footer.html')?>
</body>
</html>