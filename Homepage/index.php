<?php
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "HomeBasedBakers";

$conn = new mysqli($server, $user, $pass);

if (!($conn->connect_error))
{

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($conn->query($sql) == TRUE)
{

$conn = new mysqli($server, $user, $pass, $dbname);

if (!($conn->connect_error))
{

$sql = "CREATE TABLE IF NOT EXISTS User ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, Username VARCHAR(20) NOT NULL, Password VARCHAR(20) NOT NULL)";

$conn->query($sql);

$sql = "ALTER TABLE User ADD UNIQUE(Username)";

$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS RecipeName ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, Name VARCHAR(20) NOT NULL)";

$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS CategoryName ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, R_ID INT NOT NULL, Name VARCHAR(30) NOT NULL, FOREIGN KEY (R_ID) REFERENCES RecipeName(id) ON UPDATE CASCADE ON DELETE CASCADE)";

$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS CreatorName ( id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, Name VARCHAR(20) NOT NULL)";

$conn->query($sql);

header("Location: HomePage.html");

}
}
}
?>