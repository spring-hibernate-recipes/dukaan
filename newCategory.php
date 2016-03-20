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
		<h2>New Category</h2>
		<hr>
		<form action="fn/addCategory.php" method="POST" class="form">
			<div class="form-group">
				<label for="name">Name</label> <input type="text" name="catName"
					placeholder="Category Name" class="form-control" id="name">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add Category</button>
				&nbsp;
				<button type="reset" class="btn">Clear</button>
			</div>
		</form>
	</div>
</body>
</html>
