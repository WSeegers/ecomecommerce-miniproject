<?php
	include_once "sql.php";

	const PROD_TABLE = "Products";

	function create_new_product($product_name, $price_in_cents){
		$sql = "INSERT INTO ".PROD_TABLE." (name, price)
		VALUES ('".$product_name."', '".$price_in_cents."')";

		$conn = db_connect();
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}

	function change_product_description($product_name, $description){
		$sql = "UPDATE ".PROD_TABLE.
			" SET description = '".$description."' ".
			"WHERE name = '".$product_name."';";
			$conn = db_connect();
			if ($conn->query($sql) === TRUE) {
				echo "Description changed successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
			$conn->close();
	}

	function change_product_keys($product_name, $keywords){
		$sql = "UPDATE ".PROD_TABLE.
			" SET keywords = '".$keywords."' ".
			"WHERE name = '".$product_name."';";
			$conn = db_connect();
			if ($conn->query($sql) === TRUE) {
				echo "Keywords changed successfully";
			} else {
				echo "Error updating record: " . $conn->error;
			}
			$conn->close();
	}

	function get_product(){
		$sql = "SELECT *".
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

	function create_products_table($conn){
		$sql = "CREATE TABLE ".PROD_TABLE." (".
			"id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,".
			"name VARCHAR(128) NOT NULL,".
			"description VARCHAR(512)".
			"price INT NOT NULL,". // price in cents
			"keywords VARCHAR(512),".
			"image VARCHAR(64)".
			")";

		if ($conn->query($sql) === TRUE) {
			echo "Table ".PROD_TABLE." created successfully\n";
		} else {
			echo "Error creating table(".PROD_TABLE.": " . $conn->error. "\n";
		}
	}
?>