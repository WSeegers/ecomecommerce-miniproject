<?php
if(session_id() == '' || !isset($_SESSION)){
	session_start();
}

include "header.php";
include "topbar.php";

?>

<div class="row" style="margin-top:10px;">
	<div class="small-12">
		<p>Congratulation on your purchase!</p>
		<p>Please check you email for payment instructions</p>
	</div>
</div>

<?php
include "footer.php";
?>