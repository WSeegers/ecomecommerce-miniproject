<?php

if(session_id() == '' || !isset($_SESSION)){
	session_start();
}

if (isset($_SESSION["username"])) {
	header ("location:index.php");
}

require "config.php";

include "header.php";
include "topbar.php"
?>

<form method="POST" action="insert_user.php" style="margin-top:30px;">
	<div class="row">
		<div class="small-8">

			<div class="row">
				<div class="small-4 columns">
					<label for="right-label" class="right inline">First Name</label>
				</div>
				<div class="small-8 columns">
					<input type="text" id="right-label" name="fname">
				</div>
			</div>
			<div class="row">
				<div class="small-4 columns">
					<label for="right-label" class="right inline">Last Name</label>
				</div>
				<div class="small-8 columns">
					<input type="text" id="right-label" name="lname">
				</div>
			</div>
			<div class="row">
				<div class="small-4 columns">
					<label for="right-label" class="right inline">Address</label>
				</div>
				<div class="small-8 columns">
					<input type="text" id="right-label" name="address">
				</div>
			</div>
			<div class="row">
				<div class="small-4 columns">
					<label for="right-label" class="right inline">City</label>
				</div>
				<div class="small-8 columns">
					<input type="text" id="right-label" name="city">
				</div>
			</div>
			<div class="row">
				<div class="small-4 columns">
					<label for="right-label" class="right inline">Postal Code</label>
				</div>
				<div class="small-8 columns">
					<input type="number" id="right-label"  name="pcode">
				</div>
			</div>
			<div class="row">
				<div class="small-4 columns">
					<label for="right-label" class="right inline">E-Mail</label>
				</div>
				<div class="small-8 columns">
					<input type="email" id="right-label" name="email">
				</div>
			</div>
			<div class="row">
				<div class="small-4 columns">
					<label for="right-label" class="right inline">Password</label>
				</div>
				<div class="small-8 columns">
					<input type="password" id="right-label" name="pwd">
				</div>
			</div>
			<div class="row">
				<div class="small-4 columns">

				</div>
				<div class="small-8 columns">
					<input type="submit" id="right-label" value="Register" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
					<input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
				</div>
			</div>
		</div>
	</div>
</form>

<?php include "footer.php"?>