<?php

if (session_id() == '' || !isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION["username"])) {
	header("location:index.php");
}

include 'config.php';

include "header.php";
include "topbar.php";

echo '<div class="row" style="margin-top:10px;">';
echo '<div class="large-12">';
echo '<h3>My Orders</h3><hr>';

	$user = $_SESSION["username"];
$result = $mysqli->query("SELECT * from orders where email='" . $user . "'");
if ($result) {
	while ($prod = mysqli_fetch_assoc($result)) {
		echo '<p><h4>Order ID -> ' . $prod["id"] . '</h4></p>';
		echo '<p><strong>Date of Purchase</strong>: ' . $prod["date"] . '</p>';
		echo '<p><strong>Product Code</strong>: ' . $prod["product_code"] . '</p>';
		echo '<p><strong>Product Name</strong>: ' . $prod["product_name"] . '</p>';
		echo '<p><strong>Price Per Unit</strong>: ' . $prod["price"] . '</p>';
		echo '<p><strong>Units Bought</strong>: ' . $prod["units"] . '</p>';
		echo '<p><strong>Total Cost</strong>: ' . $currency . $prod["total"] . '</p>';
		echo '<p><hr></p>';
	}

}
include "footer.php";
?>
