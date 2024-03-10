<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <label for="numberX">Enter a number (between 10 and 100): </label>
        <input type="text" id="numberX" name="numberX" min="10" max="100" required>
        <button type="submit">Submit</button>
    </form>

    <?php
    $numericArray = array(10, 24, 37, 42, 58, 62, 76, 80, 92, 100, 16, 19);

    $numberX = isset($_POST['numberX']) ? floatval($_POST['numberX']) : null;

    if ($numberX !== null && $numberX >= 10 && $numberX <= 100) {
        $lessThanXCount = 0;
        $greaterThanXCount = 0;

        foreach ($numericArray as $element) {
            if ($element < $numberX) {
                $lessThanXCount++;
            } elseif ($element > $numberX) {
               $greaterThanXCount++;
           }
       }

       echo "Number X: $numberX<br>";
       echo "Elements less than X: $lessThanXCount<br>";
       echo "Elements greater than X: $greaterThanXCount<br>";
    } else {
       echo "Please enter a valid number between 10 and 100.";
    }
    ?>

    
</body>
</html>