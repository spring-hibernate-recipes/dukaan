<?php
include_once ('functions.php');
$sql = "select * from category where shopkeeperEmail='$_SESSION[shopkeeperEmailAddress]'";
$categories = query ( $sql );
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
		<h2>New Product</h2>
		<hr>
		<form action="fn/addProduct.php" method="POST" class="form"
			enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Name</label> <input type="text" name="name"
					placeholder="Name" class="form-control" id="name">
			</div>
			<div class="form-group">
				<label for="name">Category</label> <select class="form-control"
					name="categoryId" id="categoryId">
					<?php foreach ($categories as $category){?>
					<?php echo "<option value=\"$category[id]\">$category[name]</option>";?>
					<?php }?>
				</select> <a href="newCategory.php">Add Category</a>
			</div>
			<div class="form-group">
				<label for="unit">Unit</label> <input name="unit" id="unit"
					class="form-control" placeholder="Unit Eg. l or Kg or 500gm">
			</div>
			<div class="form-group">
				<label for="unitPrice">Unit Price</label> <input name="unitPrice"
					id="unitPrice" class="form-control" placeholder="Unit Price in Rs.">
			</div>
			<div class="form-group">
				<label for="stock">Stock</label> <input name="stock" id="stock"
					class="form-control" placeholder="Stock units">
			</div>
			<div class="form-group">
				<label for="image">Product Image</label> <input type="file"
					name="image" id="image" class="form-control" placeholder="Image"
					accept="image/*" capture="camera">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add Product</button>
				&nbsp;
				<button type="reset" class="btn">Clear</button>
			</div>
		</form>
	</div>
</body>
</html>
