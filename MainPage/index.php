<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="button.css" />
    <link rel="stylesheet" href="style.css" />
    <title><?php echo $_SESSION["User"] ?></title>
</head>

<body>
    <div class="Signin-box">
        <center>
            <h2>Home</h2>
            <a>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button onclick="window.location.href='./Bakery/index.php'">View my bakery</button>
            </a>
            <br>
            <a>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button onclick="window.location.href='../SIGNOUT/index.php'">View bakery items on portal</button>
            </a>
            <br>
        </center>
    </div>
</body>

</html>