<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th>Code</th>
            <th>Ciudad</th>
            <th>Estado</th>
            <th>País</th>
            <th>Código Postal</th>
            <th>Territorio</th>
            <th>Teléfono</th>
            <th>Dirección 1</th>
            <th>Dirección 2</th>
            <th>Eliminar</th>
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
            <td><a href="eraseOffice_Controller.php?code=<?=$office['officeCode']?>">Eliminar</a></td>
        </tr>
        <?php endforeach; ?>
</body>
</body>
</html>