<?php
if(session_id() == '' || !isset($_SESSION)){
	session_start();
}

include "header.php";
include "topbar.php";

header("Refresh: 3; url=index.php");
?>

<div class="row" style="margin-top:10px;">
	<div class="small-12">
		<p>Details successfully updated</p>
	</div>
</div>

<?php
include "footer.php";
?>