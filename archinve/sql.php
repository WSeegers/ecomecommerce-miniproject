<?php

	const DB_NAME = "shopdb";

	function sql_server_connect()
	{
		$servername = "localhost";
		$username = "root";
		$password = "password";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error() . "\n");
		}
		echo "Connected successfully to server\n";
		return ($conn);
	}

	function create_db($conn)
	{
		// Create database
		$sql = "CREATE DATABASE ".DB_NAME;
		if (mysqli_query($conn, $sql)) {
			echo "Database created successfully\n";
		} else {
			echo "Error creating database: " . mysqli_error($conn) . "\n";
		}
	}

	function db_connect()
	{
		$servername = "localhost";
		$username = "root";
		$password = "password";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, DB_NAME);
		// Check connection
		if (!$conn) {
			die("Connection failed:" . mysqli_connect_error()) . "\n";
		}
		echo "Connected successfully to db\n";
		return ($conn);
	}
?>
