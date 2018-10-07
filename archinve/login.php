<?php
	require_once "user_table.php";

	function auth($login, $passwd) {
		$user = get_user($login);
		return ($user["passwd"] == $passwd); // need hashing
	}

	session_start();
	$user = $_SESSION["logged_on_user"];
	if (!$user || $user == "ERROR"){
		$login = $_POST["login"];
		$passwd = $_POST["passwd"];

		if (!auth($login, $passwd)){
			$_SESSION["logged_on_user"] = "ERROR";
			echo "ERROR";
		} else {
			$_SESSION["logged_on_user"] = $login;
		}
	}
	echo "User: ".$user;
	header('Location: /');
?>


		
