<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopping";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$login = $_POST["login"];
$password = $_POST["password"];
$result = [];

$sql = "SELECT * FROM users WHERE us_login = '$login' AND us_password = '$password' AND us_deleted = '0'";
$loginCount = $conn->query($sql);

if ($loginCount->num_rows > 0) {
	$result['result'] = 1;
} else {
	$result['result'] = 0;
}

echo json_encode($result);

$conn->close();
