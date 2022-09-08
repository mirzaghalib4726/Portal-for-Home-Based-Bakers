<?php

$server = "localhost";
$user = "root";
$pass = "";
$dbname = "HomeBasedBakers";

$conn = new mysqli ($server, $user, $pass, $dbname);

if (!($conn->connect_error))
{
   
$uname = $_POST['Username'];
$pass = $_POST['Password'];
$cpass = $_POST['CPassword'];

$sql = "SELECT * FROM User WHERE Username = '$uname'";

$result = $conn->query($sql);

$sql = "INSERT INTO User (Username, Password) VALUES ('$uname', '$pass')";

if ($pass === $cpass)
{
    $conn->query($sql);

    echo "<script>
    alert('User Has Been Created Successfully');
    window.location.href='../Homepage/Homepage.html';
    </script>";
    die();

}
}

?>