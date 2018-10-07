<?php

if(session_id() == '' || !isset($_SESSION)){
	session_start();
}

include 'config.php';

include "header.php";
include "topbar.php";

echo '<div class="row" style="margin-top:10px">';
echo '<div class="small-12">';

$i = 0;
$product_id = array();
$product_quantity = array();

$result = $mysqli->query('SELECT * FROM products');
if($result === FALSE){
	die(mysql_error());
}

if(mysqli_num_rows($result) > 0){

	while($prod = mysqli_fetch_assoc($result)) {

		echo '<div class="large-4 columns">';
		echo '<p><h3>'.$prod["product_name"].'</h3></p>';
		echo '<img src="images/products/'.$prod["product_img_name"].'"/>';
		echo '<p><strong>Product Code</strong>: '.$prod["product_code"].'</p>';
		echo '<p><strong>Description</strong>: '.$prod["product_desc"].'</p>';
		echo '<p><strong>Units Available</strong>: '.$prod["qty"].'</p>';
		echo '<p><strong>Price </strong>: '.$currency.$prod["price"].'</p>';


		if($prod["qty"] > 0){
			echo '<p><a href="update-cart.php?action=add&id='.$prod["id"].'">'.
			'<input type="submit" value="Add To Cart" style="clear:both;'.
			' background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
		}
		else {
			echo 'Out Of Stock!';
		}
		echo '</div>';

		$i++;
	}

}

$_SESSION['product_id'] = $product_id;

echo '</div>';
echo '</div>';
include "footer.php"
		
?>

