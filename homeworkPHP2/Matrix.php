<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeric Matrix</title>
    <style>
        .result-table {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
    // Function to generate a random number in the range [10, 100]
    function generateRandomNumber() {
        return rand(10, 100);
    }

    // Function to create a new 4x4 matrix
    function createMatrix() {
        return array(
            array(generateRandomNumber(), generateRandomNumber(), generateRandomNumber(), generateRandomNumber()),
            array(generateRandomNumber(), generateRandomNumber(), generateRandomNumber(), generateRandomNumber()),
            array(generateRandomNumber(), generateRandomNumber(), generateRandomNumber(), generateRandomNumber()),
            array(generateRandomNumber(), generateRandomNumber(), generateRandomNumber(), generateRandomNumber())
        );
    }

    // Function to calculate the sum of digits in a number
    function sumOfDigits($number) {
        $sum = 0;
        $number = abs($number); // Make sure it's a positive number
        while ($number > 0) {
            $sum += $number % 10;
            $number = floor($number / 10);
        }
        return $sum;
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the value of x from the form
        $x = isset($_POST["x"]) ? $_POST["x"] : 0;

        // Create a new matrix
        $matrix = createMatrix();

        // Output the original matrix
        echo "<h2>Original Matrix</h2>";
        echo "<table border='1'>";
        for ($i = 0; $i < 4; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 4; $j++) {
                echo "<td>{$matrix[$i][$j]}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        // Output only the numbers in the matrix that are multiples of x
        echo "<div class='result-table'>";
        echo "<h2>Numbers in the Matrix That Are Multiples of X</h2>";
        echo "<ul>";

        foreach ($matrix as $row) {
            foreach ($row as $value) {
                if ($value % $x == 0) {
                    echo "<li>{$value}</li>";
                }
            }
        }

        echo "</ul>";

        // Calculate and output sum, product, mean, and sum of digits
        $flatMatrix = call_user_func_array('array_merge', $matrix);
        $sum = array_sum($flatMatrix);
        $product = array_product($flatMatrix);
        $mean = $sum / count($flatMatrix);

        echo "<p><b>Results:</b></p>";
        echo "<p><b>Sum of Elements:</b> {$sum}</p>";
        echo "<p><b>Product of Elements:</b> {$product}</p>";
        echo "<p><b>Arithmetic Mean:</b> {$mean}</p>";
        echo "<p><b>Sum of Digits for Each Element:</b></p>";

        foreach ($flatMatrix as $element) {
            echo "<p>{$element}: " . sumOfDigits($element) . "</p>";
        }

        echo "</div>";
    } else {
        // Initial matrix when the page is loaded
        $matrix = createMatrix();
    }
?>

<h2>Enter Number X</h2>

<form method="post" action="">
    <label for="x">Number X:</label>
    <input type="number" id="x" name="x" required>
    <button type="submit">Generate Matrix</button>
</form>

</body>
</html>
