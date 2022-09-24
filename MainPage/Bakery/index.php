<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <title>Update</title>
</head>
<?php
session_start();

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "homebasedbakers";

$conn = new mysqli($server, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$MUser = $_SESSION["User"];

$sql = "SELECT * FROM RecipeName
where ID in(select R_ID from CreatorName where Username=\"$MUser\")";

$result = $conn->query($sql);

?>

<body>
    <center>
        <div class="Signin-box">
            <h1>
                My Portal
            </h1>

            <table style="border: 1px solid red; margin: 5px;">

                <tr style="padding: 1px; margin: 1px;">
                    <th style="border: 1px solid yellow;  text-align: center; color: #a2ff00;">
                        Name
                    </th>

                    <th style="border: 1px solid yellow; text-align: center; color: #a2ff00;">
                        Picture
                    </th>

                    <th style="border: 1px solid yellow; text-align: center; color: #a2ff00;">
                        Description
                    </th>

                    <th style="border: 1px solid yellow; text-align: center; color: #a2ff00;">
                        Price
                    </th>

                    <th style="border: 1px solid yellow; text-align: center; color: #a2ff00;">
                        Category
                    </th>

                    <th style="border: 1px solid yellow; text-align: center; color: #a2ff00;">
                        Action
                    </th>

                    <th style="border: 1px solid yellow; text-align: center; color: #a2ff00;">
                        Action
                    </th>

                </tr>

                <?php

                while ($row = mysqli_fetch_assoc($result)) {

                    echo
                    "<tr>

                    <td style='border: 1px solid yellow; text-align: center;'>";
                    echo $row['Name'];
                    echo
                    "</td>";

                    echo"
                    <td style='border: 1px solid yellow; text-align: center;'>";
                    echo $row['Picture'];

                    echo
                    "</td>";

                    echo "
                    <td style='border: 1px solid yellow; text-align: center;'>";
                    echo $row['Description'];

                    echo
                    "</td>";

                    echo "
                    <td style='border: 1px solid yellow; text-align: center;'>";
                    echo $row['Price'];

                    echo
                    "</td>";

                    echo "
                    <td style='border: 1px solid yellow; text-align: center;'>";
                    echo $row['Category'];

                    echo
                    "</td>";

                    echo "
                    <td style='border: 1px solid yellow; text-align: center;'>";
                    echo "<a href='Update/update.php?idd=$row[id]'>";
                    echo "<span></span>";
                    echo "<span></span>";
                    echo "<span></span>";
                    echo "<span></span>";
                    echo "Update";

                    echo '</a>';

                    echo "
                    <td style='border: 1px solid yellow; text-align: center;'>";
                    echo "<a href='delete.php?idd=$row[id]'>";
                    echo "<span></span>";
                    echo "<span></span>";
                    echo "<span></span>";
                    echo "<span></span>";
                    echo "Delete";

                    echo '</a>';
                    
                    echo
                    "</td>";

                    echo
                    "</tr>";
                }
                ?>

            </table>
            <div class="Signin-box" style="top: 130%;">
                <a>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <button onclick="window.location.href='NewItem/index.php?User=<?php echo $MUser; ?>'">Add an item</button>
                </a>
            </div>
    </center>
</body>

</html>