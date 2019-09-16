<?php

$name = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];


if (!empty($name) || !empty($email) || !empty($password)) {
	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "register";
	//This creates the connection
	$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

	if (mysqli_connect_error()) {
		die('Connect Error('. mysqli_connect_error().')'. mysql_connect());
	}	else {
			$SELECT = "SELECT email from login Where email = ? Limit 1";
			$INSERT = "INSERT Into login (username, email, password) values(?, ?, ?)";

			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->store_result();
			$rnum = $stmt->num_rows;
			//This check if the input is valid
			if ($rnum==0) {
				$stmt->close();

				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("sss", $username, $email, $password);
				$stmt->execute();
				echo "Welcome $name";
			}else {
				echo "Someone already register using this email";
			}
			$stmt->close();
			$conn->close();
	}
//This check if the fields are filled
} else {
	echo "All field are required";
	die();
}

?>
