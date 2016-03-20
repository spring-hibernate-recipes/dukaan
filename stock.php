<?php
include_once ('functions.php');
$sql = "select * from product where sellerEmail='$_SESSION[shopkeeperEmailAddress]'";
$products = query ( $sql );
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
		<h2>Stock</h2>
		<hr>
		<?php if (isset($_REQUEST["success"])) {?>
		Stock updated successfully
		<?php } else if (isset($_REQUEST["err"])) {?>
		Error occured while updating stock. Please contact Administrator.
		<?php }?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Stock</th>
					<th>Price</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($products as $product) { ?>
				<tr>
					<form method="post" action="fn/updateStock.php"
						class="form form-inline">
						<input type="hidden" name="id"
							value="<?php echo $product["id"];?>">
					<td><?php echo $product["name"];?></td>
					<td><input type="text" value="<?php echo $product["stock"];?>"
						name="stock" style="width: 50px" class="form-control"></td>
					<td><input type="text" value="<?php echo $product["unitPrice"];?>"
						name="unitPrice" style="width: 50px; display: inline"
						class="form-control">&nbsp;/&nbsp;<?php echo $product["unit"]?></td>
					<td><button type="submit" class="btn btn-primary"
							href="#<?php echo $product["id"];?>">Update</button></td>
					</form>
				</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</body>
</html>
