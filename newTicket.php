<!DOCTYPE HTML>  
<html>
<head>
	<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' type='text/css' rel='stylesheet' />
	<link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave" rel="stylesheet">
	<link rel="stylesheet" href="websiteStyle.css">
	<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
</head>
<body>  
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<a class="navbar-brand" href="#">Grandma's computing</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="ticket.php">Back</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class='container'>

<?php
$name = $email = $email2 = $requestType = $request = "";
$nameErr = $emailErr = $requestTypeErr = $requestErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and blank spaces are allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email2 = test_input($_POST["email"]);
    if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["requestType"])) {
    $requestType = "";
  } else {
    $requestType = test_input($_POST["requestType"]);
  }

  if (empty($_POST["request"])) {
    $request = "";
  } else {
    $request = test_input($_POST["request"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<a href='ticket.php' class'previous round'> &#8249;</a>
<h2>Submit new ticket</h2>
<p><h4><span class="error">* required field</span><h4></p>

<form method="post" action="creatTick.php">
  <label for="name">Name:</label><br>
  <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  <label for="email">Email:</label><br>
  <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <label for="email2">Email:</label><br>
  <input type="text" name="email2" value="<?php echo $email2;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  <label for="requestType">Request type:</label><br>
  <input type="text" name="requestType" value="<?php echo $requestType;?>">
  <span class="error"><?php echo $requestTypeErr;?></span>
  <br><br>
  <label for="request">Request:</label><br>
  <textarea name="request" rows="5" cols="40"><?php echo $request;?></textarea>
  <span class="error"><?php echo $requestErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
</body>
</html>