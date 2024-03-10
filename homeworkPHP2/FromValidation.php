<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Validation Example</title>
</head>
<body>
    <?php
        $nameErr = $emailErr = $genderErr = "";
        $name = $email = $website = $comment = $gender = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }

            if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
            } else {
                $gender = test_input($_POST["gender"]);
            }

            $website = test_input($_POST["website"]);
            $comment = test_input($_POST["comment"]);
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h1>PHP Form Validation Example</h1>
        <p class="red">* required fields</p>
        <div class="name">
            <label for="name">Name:</label>
            <input type="text" name="name">
            <label class="red" for="name">* <?php echo $nameErr;?></label>
        </div>
        <br>
        <div>
            <label for="email">E-mail:</label>
            <input type="email" name="email">
            <label class="red" for="email">* <?php echo $emailErr;?></label>
        </div>
        <br>
        <div>
            <label for="website">Website:</label>
            <input type="text" name="website">
        </div>
        <br>
        <div>
            <label for="comment">Comment:</label>
            <textarea name="comment" cols="30" rows="10"></textarea>
        </div>
        <br>
        <div>
            <label for="gender">Gender:</label>
            <input type="radio" name="gender" value="female"> Female
            <input type="radio" name="gender" value="male"> Male
            <input type="radio" name="gender" value="other"> Other
            <label class="red">* <?php echo $genderErr;?></label>
        </div>
        <br>
        <button type="submit">Submit</button>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($genderErr)) {
            echo "<h1>Your input:</h1>";
            echo "Name: $name <br>";
            echo "Email: $email <br>";
            echo "Gender: $gender <br>";

            if (!empty($website)) {
                echo "Website: $website <br>";
            }
            if (!empty($comment)) {
                echo "Comment: $comment <br>";
            }
        }
    ?>

    <style>
        .name {
            display: flex;
        }
        form {
            border: 1px solid black;
            width: 500px;
            padding-left: 30px;
        }
        .red {
            color: red;
        }
    </style>
</body>
</html>
