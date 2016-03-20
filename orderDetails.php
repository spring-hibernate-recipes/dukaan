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
<?php

$sql = "select customer.name, customer.address, customer.locality, customer.city, customer.contactNumber, order.orderId, order.amount, order.createdDate, order.orderType from `order` join customer on order.customerEmail=customer.emailAddress where order.orderId='$_REQUEST[id]' and order.shopkeeperEmail='$_SESSION[shopkeeperEmailAddress]'";

$result = query ( $sql );

$orderId = $result [0] ["orderId"];
$orderItems = query ( "select product.name, orderItem.quantity, orderItem.amount from orderItem join product on orderItem.productId=product.id where orderId='$orderId'" );
?>
	<div style="padding-top: 20px">
			<a
				href="fn/updateStatus.php?id=<?php echo $_REQUEST['id'];?>&status=2"
				class="btn btn-warning">Ready</a> <a
				href="fn/updateStatus.php?id=<?php echo $_REQUEST['id'];?>&status=3"
				class="btn btn-primary">Done</a> <a href="home.php"
				class="btn btn-success">Back to Orders</a>
		</div>
		<hr>
		<h2><?php echo $result[0]["name"];?> - <?php echo $result[0]["address"] . ', '. $result[0]["locality"] . ', ' . $result[0]["city"];?></h2>
		<h3 style="color: #0000ff"><?php echo $result[0]["contactNumber"];?></h3>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Item</th>
					<th>Quantity</th>
					<th>Amount</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ( $orderItems as $orderItem ) {
					?>
				<tr>
					<td><?php echo $orderItem["name"]?></td>
					<td><?php echo $orderItem["quantity"]?></td>
					<td><?php echo $orderItem["amount"]?></td>
				</tr>
				<?php
				}
				$orderAmnt = $result [0] ["amount"];
				echo "<tr>";
				echo "<td colspan=\"2\" style=\"text-align: right\">Total: Rs.</td>";
				echo "<td>$orderAmnt</td>";
				echo "</tr>";
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
