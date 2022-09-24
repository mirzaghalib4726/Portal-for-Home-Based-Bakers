<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "homebasedbakers";

$conn = new mysqli($server, $user, $pass, $dbname);

$va = $_GET['cat'];

$row = $_GET['id'];

$sql = "INSERT INTO CategoryName (Name) VALUES ('$va')";

$conn->query($sql);

echo 
"<script>
window.location.href='update.php?idd=$row';
</script>";

?>