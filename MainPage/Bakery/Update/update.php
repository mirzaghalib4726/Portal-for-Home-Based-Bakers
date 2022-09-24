<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="button.css " />
    <title>Update Item</title>

    <?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "homebasedbakers";

    $conn = new mysqli($server, $user, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $ud = $_GET['idd'];
    echo $ud;
    $sql = "SELECT * FROM RecipeName WHERE id =\"$ud\"";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    ?>

</head>

<body>
    <div class="signup-box">
        <h2>Item Details</h2>
        <form action="UpdateData.php" method="POST" autocomplete="on" nctype="multipart/form-data">
            <div class="user-box">
                <input type="text" name="Name" required value=" <?php echo $row['Name']; ?>" />
                <label> Name </label>
            </div>
            <div class="user-box">
                <input type="file" id="img" name="img" accept="image/*" required value=" <?php echo $row['Picture']; ?>">
                <label>Upload Picture</label>
            </div>
            <div class="user-box">
                <input type="text" name="Description" required value=" <?php echo $row['Description']; ?>" />
                <label>Description</label>
            </div>
            <div class="user-box">
                <input type="number" name="Price" required value="55" />
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
                        <option value="<?php echo $row['Name']; ?>"> <?php echo $row['Name']; ?>

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

                <a>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <button action="UpdateData.php?idd"  id="Submit">Update</button>
                </a>
            </div>
        </form>
    </div>
    <script>
        function insertValue() {
            var a = document.getElementById('val').value;
            window.location.href = "add.php?id=" + a;
        };
    </script>

</body>

</html>