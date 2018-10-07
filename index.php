<?php

if(session_id() == '' || !isset($_SESSION)){
  session_start();
}

require "config.php"

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $shopname ?></title>
    <link rel="stylesheet" href="css/foundation.css" />
  </head>
  <body>

    <?php include "topbar.php"?>

    <img data-interchange="[images/bolt-retina.jpg, (retina)], [images/bolt-landscape.jpg, (large)], [images/bolt-mobile.jpg, (mobile)], [images/bolt-landscape.jpg, (medium)]">
    <noscript><img src="images/bolt-landscape.jpg"></noscript>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy;<?php echo $shopname ?>. All Rights Reserved.</p>
        </footer>

      </div>
    </div>

  </body>
</html>