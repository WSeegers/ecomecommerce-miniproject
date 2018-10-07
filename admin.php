<?php
if(session_id() == '' || !isset($_SESSION)){
	session_start();
}
if(!isset($_SESSION["username"])) {
  header("location:index.php");
}
if($_SESSION["type"]!="admin") {
  header("location:index.php");
}
include 'config.php';

include "header.php";
include "topbar.php";

echo 
	'<div class="row" style="margin-top:10px;">'.
		'<div class="large-12">'.
			'<h3>Hey Admin!</h3>';
		
		$result = $mysqli->query("SELECT * from products order by id asc");
		if($result) {
			while($prod = mysqli_fetch_assoc($result)) {
			  echo 
			  	'<div class="large-4 columns">'.
			   		'<p><h3>'.$prod["product_name"].'</h3></p>'.
			   		'<img src="images/products/'.$prod["product_img_name"].'"/>'.
			   		'<p><strong>Product Code</strong>: '.$prod["product_code"].'</p>'.
					'<p><strong>Description</strong>: '.$prod["product_desc"].'</p>'.
					'<p><strong>Units Available</strong>: '.$prod["qty"].'</p>'.
					'<div class="large-6 columns" style="padding-left:0;">'.
						'<form method="post" name="update-quantity" action="admin-update.php">'.
						'<p><strong>New Qty</strong>:</p>'.
			 		'</div>'.
			   		'<div class="large-6 columns">'.
						'<input type="number" name="quantity[]"/>'.
					'</div>'.
				'</div>';
			}
		  }
echo 	
		'</div>'.
	'</div>';
	
?>