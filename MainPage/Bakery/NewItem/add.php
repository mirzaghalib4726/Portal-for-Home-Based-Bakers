<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "homebasedbakers";

$conn = new mysqli($server, $user, $pass, $dbname);

$va = $_GET['cat'];

$sql = "INSERT INTO CategoryName (Name) VALUES ('$va')";

$conn->query($sql);

echo 
"<script>
window.location.href='index.php';
</script>";

?>