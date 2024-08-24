<?php
$serverName = "localhost"; // Database server (usually localhost for local projects)
$userName= "your_username"; // Replace with your database username
$password= "your_password"; // Replace with your database password
$dbName= "your_database_name"; // Replace with your database name

$connect = new mysqli($serverName, $userName, $password, $dbName);

if($connect->connect_error)
{
    die("DB Connection failed......");
}
?>
