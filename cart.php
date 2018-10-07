<?php

if (session_id() == '' || !isset($_SESSION)) {
	session_start();
}

include 'config.php';

include "header.php";
include "topbar.php";

echo '<div class="row" style="margin-top:10px;">';
echo '<div class="large-12">';

echo '<p><h3>Your Shopping Cart</h3></p>';

if (isset($_SESSION['cart'])) {

	$total = 0;
	echo '<table>';
	echo '<tr>';
	echo '<th>Code</th>';
	echo '<th>Name</th>';
	echo '<th>Quantity</th>';
	echo '<th>Cost</th>';
	echo '</tr>';
	foreach ($_SESSION['cart'] as $product_id => $quantity) {

		$result = $mysqli->query("SELECT product_code, product_name, product_desc, qty, price FROM products WHERE id = " . $product_id);


		if ($result) {

			while ($prod = mysqli_fetch_assoc($result)) {
				$cost = $prod["price"] * $quantity; //work out the line cost
				$total = $total + $cost; //add to the total cost

				echo '<tr>';
				echo '<td>' . $prod["product_code"] . '</td>';
				echo '<td>' . $prod["product_name"]. '</td>';
				echo '<td>' . $quantity . '&nbsp;<a class="button [secondary success alert]"'.
					' style="padding:5px;" href="update-cart.php?action=add&id='.
					$product_id . '">+</a>&nbsp;<a class="button alert" style="padding:5px;"'.'
					 href="update-cart.php?action=remove&id=' . $product_id . '">-</a></td>';
				echo '<td>' . $cost . '</td>';
				echo '</tr>';
			}
		}

	}

	echo '<tr>';
	echo '<td colspan="3" align="right">Total</td>';
	echo '<td>' . $total . '</td>';
	echo '</tr>';

	echo '<tr>';
	echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="button alert">Empty Cart</a>&nbsp;<a href="products.php" class="button [secondary success alert]">Continue Shopping</a>';
	if (isset($_SESSION['username'])) {
		echo '<a href="update-orders.php"><button style="float:right;">COD</button></a>';
	} else {
		echo '<a href="login.php"><button style="float:right;">Login</button></a>';
	}

	echo '</td>';

	echo '</tr>';
	echo '</table>';
} else {
	echo "You have no items in your shopping cart.";
}

echo '</div>';
echo '</div>';

include "footer.php"
?>
