<?php
session_start();
?>
<!DOCTYPE hmtl>
<html>
	<head>
		<title>Main page</title>
		<link rel = "stylesheet" href = "details.css">
	</head>
	<body class = "bk">
		<div class = "back-div">
			<div id = "back" class = "a">
				<div class = "menu" id = "userinfo">
				<?php
			$user = $_SESSION["logged_on_user"];
			if ($user == "ERROR") {
				include "./includes/login.php";
				$_SESSION["logged_on_user"] = "";
			} else if ($user) {
				echo file_get_contents("./includes/logout.html");
			} else {
				include "./includes/login.php";
			}
				?>
				</div>
				<h1>HOT SPOT</h1>
			</div>
			<div class = "main">
			<?php
				
			?>
			</div>
		</div>
	</body>
</html> 
