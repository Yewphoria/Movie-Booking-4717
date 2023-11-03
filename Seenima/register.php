<?php //register.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seenima";

$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn){
		echo "Database in not online";
		exit;
}

$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$name = $_POST['name'];
$salutation = $_POST['salutation'];
$phonenumber = $_POST['phonenumber'];
$date= $_POST['date'];

$sql = "INSERT INTO customers (name, salutation, email, password, phonenumber, date)
		VALUES ('$name', '$salutation', '$email', '$password', '$phonenumber', '$date')";
$result = $conn->query($sql);

if ($result){
	echo "Welcome ". $name . ". You are now registered<br>";
	echo '<meta http-equiv="refresh" content="0;URL=login.php" />';
}
?>