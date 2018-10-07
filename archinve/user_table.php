<?php
	include_once "sql.php";

	const USERS_TABLE = "Users";

	function has_user($username){
		$sql = "SELECT username FROM ".USERS_TABLE.
			" WHERE username = '".$username."';";
		$conn = db_connect();
		$result = $conn->query($sql);
		$conn->close();
		if (mysqli_num_rows($result) > 0)
			return (true);
		return (false);
	}

	function get_user($username){
		$sql = "SELECT id, username, passwd".
			" FROM ".USERS_TABLE.
			" WHERE username = '".$username."';";
		$conn = db_connect();
		$result = $conn->query($sql);
		$conn->close();
		if (mysqli_num_rows($result) > 0)
			return (mysqli_fetch_assoc($result));
		else
			return (false);
	}

	function change_password($username, $passwd){
		$sql = "UPDATE ".USERS_TABLE.
			" SET passwd ='".$passwd."' ".
			"WHERE username='".$username."';";
			$conn = db_connect();
			if ($conn->query($sql) === TRUE) {
				echo "Password changed successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
			$conn->close();
	}

	function create_new_user($username, $passwd){
		$sql = "INSERT INTO ".USERS_TABLE." (username, passwd)
		VALUES ('".$username."', '".$passwd."')";

		$conn = db_connect();
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}

	function create_users_table($conn){
		// $sql = "CREATE TABLE ".USERS_TABLE." (".
		// 	"id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,".
		// 	"username VARCHAR(16) NOT NULL,".
		// 	"passwd VARCHAR(128) NOT NULL,".
		// 	"firstname VARCHAR(30) NOT NULL,".
		// 	"lastname VARCHAR(30) NOT NULL,".
		// 	"email VARCHAR(50),".
		// 	"reg_date TIMESTAMP".
		// 	")";
		$sql = "CREATE TABLE ".USERS_TABLE." (".
			"id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,".
			"username VARCHAR(16) NOT NULL,".
			"passwd VARCHAR(128) NOT NULL".
			")";
		if ($conn->query($sql) === TRUE) {
			echo "Table ".USERS_TABLE." created successfully\n";
		} else {
			echo "Error creating table(".USERS_TABLE.": " . $conn->error. "\n";
		}
	}
?>
