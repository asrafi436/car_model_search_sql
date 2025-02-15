<?php
$servername = "localhost";
$username = "asrafi129";
$password = "162157899";
$dbname = "car_management";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
