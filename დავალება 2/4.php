    <?php
        $cars = array(
            array("Make" => "Toyota", "Model" => "Corolla", "Color" => "White", "Mileage" => 24000, "Status" => "Sold"),
            array("Make" => "Toyota", "Model" => "Camry", "Color" => "Black", "Mileage" => 56000, "Status" => "Available"),
            array("Make" => "Honda", "Model" => "Accord", "Color" => "White", "Mileage" => 15000, "Status" => "Sold")
        );
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Information</title>
</head>
<body>

    <h2>Car Information</h2>

    <table>
        <thead>
            <tr>
                <th>Make</th>
                <th>Model</th>
                <th>Color</th>
                <th>Mileage</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cars as $car): ?>
                <tr>
                    <td><?php echo $car["Make"]; ?></td>
                    <td><?php echo $car["Model"]; ?></td>
                    <td><?php echo $car["Color"]; ?></td>
                    <td><?php echo $car["Mileage"]; ?></td>
                    <td><?php echo $car["Status"]; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

</body>
</html>
