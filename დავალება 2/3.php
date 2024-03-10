<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeric Matrix</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php
$rows = 6;
$cols = 5;
?>

<table>
    <caption>Numeric Matrix</caption>
    <thead>
        <tr>
            <th></th>
            <?php for ($j = 0; $j < $cols; $j++) : ?>
                <th><?php echo $j; ?></th>
            <?php endfor; ?>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < $rows; $i++) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <?php for ($j = 0; $j < $cols; $j++) : ?>
                    <td><?php echo $i + $j; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </tbody>
</table>

</body>
</html>
