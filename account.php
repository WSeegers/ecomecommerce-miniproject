<?php

if (session_id() == '' || !isset($_SESSION)) {
	session_start();
}

if (!isset($_SESSION["username"])) {
	echo '<h1>Invalid Login! Redirecting...</h1>';
	header("Refresh: 3; url=index.php");
}

if ($_SESSION["type"] === "admin") {
	header("location:admin.php");
}

include 'config.php';

include "header.php";
include "topbar.php";

echo '<div class="row" style="margin-top:30px;">' .
		'<div class="small-12">' .
			'<p><?php echo <h3>Hi ' . $_SESSION['fname'] . '</h3>' .
			'<p><h4>Account Details</h4></p>' .
		'</div>' .
	 '</div>';

echo '<form method="POST" action="update.php" style="margin-top:30px;">' .
		'<div class="row">' .
			'<div class="small-12">' .
				'<div class="row">' .
					'<div class="small-3 columns">' .
				'<label for="right-label" class="right inline">First Name</label>' .
			'</div>' .
			'<div class="small-8 columns end">';

$result = $mysqli->query('SELECT * FROM users WHERE id=' . $_SESSION['id']);

if ($result === false) {
	die(mysql_error());
}

if ($result) {
	$prod = mysqli_fetch_assoc($result);

	echo 		
	
				'<input type="text" id="right-label" placeholder="' . $prod["fname"] . '" name="fname">'.
			'</div>'.
	 	'</div>'.

	 	'<div class="row">'.
	 		'<div class="small-3 columns">'.
	 			'<label for="right-label" class="right inline">Last Name</label>'.
	 		'</div>'.
	 			'<div class="small-8 columns end">'.
	 				'<input type="text" id="right-label" placeholder="' . $prod["lname"] . '" name="lname">'.
				'</div>'.
			 '</div>'.
			 
	 	'<div class="row">'.
	 		'<div class="small-3 columns">'.
	 			'<label for="right-label" class="right inline">Address</label>'.
	 		'</div>'.
			'<div class="small-8 columns end">'.
	 			'<input type="text" id="right-label" placeholder="' . $prod["address"] . '" name="address">'.
	 		'</div>'.
	 	'</div>'.

	 	'<div class="row">'.
	 		'<div class="small-3 columns">'.
	 			'<label for="right-label" class="right inline">City</label>'.
	 		'</div>'.
	 		'<div class="small-8 columns end">'.
	 			'<input type="text" id="right-label" placeholder="' . $prod["city"] . '" name="city">'.
			'</div>'.
		'</div>'.

		'<div class="row">'.
			'<div class="small-3 columns">'.
				'<label for="right-label" class="right inline">Pin Code</label>'.
			'</div>'.
			'<div class="small-8 columns end">'.
				'<input type="text" id="right-label" placeholder="' . $prod["pcode"] . '" name="pcode">'.
			'</div>'.
		'</div>'.

		'<div class="row">'.
			'<div class="small-3 columns">'.
				'<label for="right-label" class="right inline">Email</label>'.
			'</div>'.
			'<div class="small-8 columns end">'.
				'<input type="email" id="right-label" placeholder="' . $prod["email"] . '" name="email">'.
			'</div>'.
		'</div>';
}

echo	'<div class="row">'.
 			'<div class="small-3 columns">'.
 				'<label for="right-label" class="right inline">Password</label>'.
			 '</div>'.
 			'<div class="small-8 columns end">'.
 				'<input type="password" id="right-label" name="pwd">'.
			'</div>'.
 		'</div>'.

	    '<div class="row">'.
            '<div class="small-4 columns">'.
            '</div>'.
            '<div class="small-8 columns">'.
			  '<input type="submit" id="right-label" value="Update"'.
				  ' style="background: #0078A0; border: none; color: #fff; font-family: "Helvetica Neue",'.
				  ' sans-serif; font-size: 1em; padding: 10px;">'.
			  '<input type="reset" id="right-label" value="Reset"'.
			  ' style="background: #0078A0; border: none; color: #fff;'.
			  ' font-family: "Helvetica Neue", sans-serif; font-size: 1em; padding: 10px;">'.
           '</div>'.
          '</div>'.
        '</div>'.
      '</div>'.
    '</form>';

include "footer.php";
?>