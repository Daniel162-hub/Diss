<!DOCTYPE html>
<?php
	include("connection.php");
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$requestType = $_POST['requestType'];
	$request = $_POST['request'];

	$query = "INSERT INTO ticket(name, email, requestType, request) VALUES(?, ?, ?, ?)";
	
	if($stmt = $conn->prepare($query)){
		$stmt->bind_param("ssss", $name, $email, $requestType, $request);
		$stmt->execute();
		$stmt->close();
	}

?>
<html lang="en">
  <head>
	<link rel="stylesheet" href="websiteStyle.css">
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' type='text/css' rel='stylesheet' />
	<link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave" rel="stylesheet">
	<link rel="stylesheet" href="websiteStyle.css">
	<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
    <title>Database Connection Example - Simple Address Book - PHP Output (UPDATE)</title>
  </head>
  <body>
    <h2>Ticket submitted</h2>
    <p><a href="ticket.php">Return to ticket page</a></p>
  </body>
</html>
