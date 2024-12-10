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
$email = $_POST["email"];
$password = $_POST["password"];
$result = [];

// $sql = "INSERT INTO people (firstname, `surname`) VALUES ('$firstName', '$surname')";

$sql = "SELECT * FROM users WHERE us_login = '$login'";
$loginCount = $conn->query($sql);

if ($loginCount->num_rows > 0) {
	$result['result'] = 2;
} else {
	$sql = "INSERT INTO users (us_login, us_email, us_password) VALUES ('$login', '$email', '$password')";

	if ($conn->query($sql) === TRUE) {
		$result['result'] = 1;
	} else {
		$result['result'] = 0;
	}
}

echo json_encode($result);

$conn->close();
