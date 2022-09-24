<?php

    session_start();
    $MUser = $_SESSION['User'];
    echo $MUser;
    $server = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "homebasedbakers";

    $conn = new mysqli ($server, $user, $pass, $dbname);

    if (!($conn->connect_error))
    {
        $name = $_POST['Name'];
        $des = $_POST['Description'];
        $price = $_POST['Price'];
        $cat = $_POST['categories'];
        $picture = $_POST['img'];

        $sql = "INSERT INTO RecipeName (Name, Picture, Description, Price, Category) VALUES ('$name', '$picture', '$des', '$price', '$cat')";

        $conn->query($sql);

        $sql = "SELECT * from RecipeName WHERE Name = '$name'";

        $result = $conn->query($sql);

        $row = mysqli_fetch_assoc($result);

        $c = $row['id'];

        $sql = "INSERT INTO CreatorName (Username, R_ID) VALUES ('$MUser', '$c' )";
        
        $conn->query($sql);

        echo "<script>
        alert('Item Has Been Created Successfully');
        window.location.href='../index.php';
        </script>";
        die();
    }
 ?>
