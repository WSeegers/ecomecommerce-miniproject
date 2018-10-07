<?php

	require_once "config.php";

	$mysqli = mysqli_connect($db_host, $db_username, $db_password);
	if (!$mysqli) {
		die("Connection failed: " . mysqli_connect_error() . "\n");
	}
	echo "Connected successfully to server\n";

	// Create Db
	$sql = "CREATE DATABASE IF NOT EXISTS ".$db_name;
	if (mysqli_query($mysqli, $sql)) {
		echo "Database created successfully\n";
	} else {
		die ("Error creating database: " . mysqli_error($mysqli) . "\n");
	}
	$mysqli->close();

	$mysqli = mysqli_connect($db_host, $db_username, $db_password, $db_name);

	// Create products table
	$sql = "CREATE TABLE IF NOT EXISTS `products` (
		`id` int(11) NOT NULL auto_increment,
		`product_code` varchar(60) NOT NULL,
		`product_name` varchar(60) NOT NULL,
		`product_desc` varchar(256) NOT NULL,
		`product_img_name` varchar(60) NOT NULL,
		`qty` int(5) NOT NULL,
		`price` decimal(10,2) NOT NULL,
		PRIMARY KEY  (`id`),
		UNIQUE KEY `product_code` (`product_code`)
		)";
	if ($mysqli->query($sql) === TRUE) {
		echo "Table products created successfully\n";
	} else {
		die("Error creating table . $mysqli->error. \n");
	}

	// Create users table
	$sql = "CREATE TABLE IF NOT EXISTS `users` (
		`id` int(11) NOT NULL auto_increment,
		`fname` varchar(255) NOT NULL,
		`lname` varchar(255) NOT NULL,
		`address` varchar(255) NOT NULL,
		`city` varchar(100) NOT NULL,
		`pcode` int(6) NOT NULL,
		`email` varchar(255) NOT NULL,
		`password` varchar(15) NOT NULL,
		`type` varchar(20) NOT NULL default 'user',
		PRIMARY KEY  (`id`),
		UNIQUE KEY `email` (`email`)
	  )";

	if ($mysqli->query($sql) === TRUE) {
		echo "Table users created successfully\n";
	} else {
		die("Error creating table  $mysqli->error \n");
	}

	// Create orders table
	$sql = "CREATE TABLE IF NOT EXISTS `orders` (
		`id` int(15) NOT NULL auto_increment,
		`product_code` varchar(255) NOT NULL,
		`product_name` varchar(255) NOT NULL,
		`product_desc` varchar(255) NOT NULL,
		`price` int(10) NOT NULL,
		`units` int(5) NOT NULL,
		`total` int(15) NOT NULL,
		`date` timestamp NOT NULL default CURRENT_TIMESTAMP,
		`email` varchar(255) NOT NULL,
		PRIMARY KEY  (`id`)
	  )";

	if ($mysqli->query($sql) === TRUE) {
		echo "Table orders created successfully\n";
	} else {
		die("Error creating table $mysqli->error \n");
	}
?>