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

$ud = $_GET['idd'];

$sql = "DELETE FROM RecipeName WHERE id = \"$ud\"";

$result = $conn->query($sql);

header('Location: index.php');
