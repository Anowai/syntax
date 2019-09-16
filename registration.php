<?php 

$name = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password2 = $_POST["password2"];


if (!empty($name) || !empty($email) || !empty($password) || !empty($password2)) {
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
			$INSERT = "INSERT Into login (username, email, password, password2) values(?, ?, ?, ?)";

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
				$stmt->bind_param("ssss", $username, $email, $password, $password2);
				$stmt->execute();
				echo "New record inserted successfully";
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
