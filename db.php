<?php
$con = mysqli_connect("localhost","root","","mukeshjewellers");


$currency			= '₹ '; //currency symbol
$imageServerIp = "http://localhost/mjbackend/uploads/";
$apiUrl = "http://localhost/mjbackend/index.php/api/";
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to Database: " . mysqli_connect_error();
  }
?>