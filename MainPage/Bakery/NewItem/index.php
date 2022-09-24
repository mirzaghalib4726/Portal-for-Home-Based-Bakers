<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="button.css " />
    <title>New Item</title>
    <?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "homebasedbakers";

    $conn = new mysqli($server, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>

</head>

<body>
    <div class="signup-box">
        <h2>Item Details</h2>
        <form action="process.php" method="POST" autocomplete="on" nctype="multipart/form-data">
            <div class="user-box">
                <input type="text" name="Name" required />
                <label> Name </label>
            </div>
            <div class="user-box">
                <input type="file" id="img" name="img" accept="image/*" required>
                <label>Upload Picture</label>
            </div>
            <div class="user-box">
                <input type="text" name="Description" required />
                <label>Description</label>
            </div>
            <div class="user-box">
                <input type="text" name="Price" required />
                <label>Price</label>
            </div>
            <div style="color: white;">
                Choose a Category
                <select name="categories" id="select" required>
                    <option value="" disabled> Choose a Category </option>
                    <?php

                    $sql = "SELECT * from CategoryName";

                    $result = $conn->query($sql);

                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                        <option value="<?php echo $row['Name']; ?>"> <?php echo $row['Name'] ?>

                        </option>
                    <?php
                    }
                    ?>
                </select>

                <input type="text" id="val" placeholder="Add new category">
                <button type="button" onclick="insertValue();">
                    Add
                </button>
                <br>
            </div>
            <a>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button action="process.php" id="Submit">Add</button>
            </a>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button type="reset">Reset</button>
            </a>
        </form>
    </div>
    <script>
        function insertValue() {
            const a = document.getElementById('val').value;
            window.location.href = "add.php?cat=" + a;
        };
    </script>
</body>

</html>