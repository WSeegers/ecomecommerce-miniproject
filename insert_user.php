<?php

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pcode = $_POST["pcode"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];

$sql = "INSERT INTO `users`".
	" (`fname`, `lname`, `address`, `city`, `pcode`, `email`, `password`)".
	" VALUES ('$fname', '$lname', '$address', '$city', $pcode, '$email', '$pwd');";
if($mysqli->query($sql)){
	echo 'Data inserted';
	echo '<br/>';
} else {
	die("Error inserting $mysqli->error \n");
}

header ("location:login.php");

?>