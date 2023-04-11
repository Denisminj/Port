<?php
	$firstName = $_POST['firstName'];
	$email = $_POST['email'];
	$number = $_POST['number'];
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into port(firstName, email, number, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName, $email, $number, $message);
		$execval = $stmt->execute();
		echo $execval;
		echo "<script>alert('Message sent successfully!');</script>";
		echo "<script>window.location.href = 'index.html';</script>"; 
		$stmt->close();
		$conn->close();
	}
?>