<?php

  $servername = "katara.scam.keele.ac.uk";
  $username = "x5g62";
  $password = "x5g62x5g62";
  $dbname = "grandma's computing";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
  	die("Connection failed: " . mysqli_connect_error());
  }
?>
