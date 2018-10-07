<?php
	require_once "user_table.php";
	require_once "products_table.php";

	$main_page = new DOMDocument;
	$main_page->loadHTMLFile("./html/main.html");
	$main = $main_page->getElementById("main");
	print_r ($main->nodeValue);
?>