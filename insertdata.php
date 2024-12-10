<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$firstName = $_POST["ad"];
// $surname = $_POST["soyad"];
$password = $_POST["parol"];
$result = [];

// $sql = "INSERT INTO people (firstname, `surname`) VALUES ('$firstName', '$surname')";
$sql = "INSERT INTO people (firstname, `password`) VALUES ('$firstName', '$password')";

if ($conn->query($sql) === TRUE) {
	$result['result'] = 1;
} else {
	$result['result'] = 0;
}

echo json_encode($result);

$conn->close();
