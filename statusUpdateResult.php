<?php
include_once ('functions.php');
?>
<html>
<head>
<meta name="viewport"
	content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<?php include_once('jquery.php');?>
<?php include_once('bootstrap.php');?>
<?php include_once('stylesheets.php');?>
<title>eDukaan Shop Owner Console</title>
</head>
<body>
<?php include_once('menu.php');?>
<div class="main-content">
<?php if(isset($_REQUEST["success"])) {?>
	<h2>Status Updated Successfully.</h2>
<?php } else {?>
	<h2>Status Update Failed. Please go back and retry. In case failure
			persists please contact administrator.</h2>
<?php }?>
		<hr>
		<a href="home.php" class="btn btn-primary">Orders</a>
	</div>
</body>
</html>
