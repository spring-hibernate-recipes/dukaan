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
<script type="text/javascript">
	$(document).ready(function(){
		window.setTimeout(refreshPage, 120000);
	});
	function refreshPage(){
		window.location = "home.php";
	}
</script>
</head>
<body>
<?php include_once('menu.php');?>
<div class="main-content">
<?php
if (isset ( $_REQUEST ["type"] )) {
	$type = $_REQUEST ["type"];
	
	$result = query ( "select `order`.createdDate, `order`.orderId, customer.name, customer.address, `order`.amount, `order`.orderType, `order`.status from `order` join customer on `order`.customerEmail=customer.emailAddress join shopkeeper on `order`.shopkeeperEmail=shopkeeper.emailAddress where shopkeeper.emailAddress='$_SESSION[shopkeeperEmailAddress]' and `order`.status='$type' order by `order`.createdDate desc" );
} else {
	$result = query ( "select `order`.createdDate, `order`.orderId, customer.name, customer.address, `order`.amount, `order`.orderType, `order`.status from `order` join customer on `order`.customerEmail=customer.emailAddress join shopkeeper on `order`.shopkeeperEmail=shopkeeper.emailAddress where shopkeeper.emailAddress='$_SESSION[shopkeeperEmailAddress]' order by `order`.createdDate desc" );
}
?>
	<table cellspacing="0" cellpadding="0" style="width: 100%">
			<tr>
				<td><h2 style="padding-left: 10px;">Orders</h2></td>
				<td style="width: 100%; text-align: right"><a href="home.php?type=1"
					class="btn btn-success">Fresh</a>&nbsp;<a href="home.php?type=2"
					class="btn btn-warning">Ready</a>&nbsp;<a href="home.php?type=3"
					class="btn btn-primary">Done</a></td>
			</tr>
		</table>
		<table class="table table-simple">
<?php
foreach ( $result as $row ) {
	$date = $row ["createdDate"];
	$name = $row ["name"];
	$address = $row ["address"];
	$amount = $row ["amount"];
	$id = $row ["orderId"];
	if ($row ["orderType"] == 1) {
		$type = "Home Delivery";
	} else {
		$type = "Pick Up";
	}
	if ($row ["status"] == 1) {
		$status = "<span class=\"label label-success\">Fresh</span>";
	} else if ($row ["status"] == 2) {
		$status = "<span class=\"label label-warning\">Ready</span>";
	} else if ($row ["status"] == 3) {
		$status = "<span class=\"label label-primary\">Delivered</span>";
	}
	?>
		<tr>
				<td>
<?php
	echo "<b><span style=\"color: #ff6600\">$date</span>&nbsp;&nbsp;<span class=\"label label-default\">$type</span>&nbsp;$status<br>$name</b><br>$address<br>Rs. $amount<br><a href=\"orderDetails.php?id=$id\">Details</a>";
	?>
			</td>
			</tr>
<?php
}
?>
</table>
	</div>
</body>
</html>
