<?php
include_once '../functions.php';

if (isset ( $_SESSION ["shopkeeperEmailAddress"] )) {
	
	if (isset ( $_REQUEST ["catName"] )) {
		$name = $_REQUEST ["catName"];
		$shopkeeperEmail = $_SESSION ["shopkeeperEmailAddress"];
		$sql = "insert into category (name, shopkeeperEmail) values ('$name', '$shopkeeperEmail')";
		$result = save ( $sql );
		if ($result) {
			header ( "Location: ../addCategorySuccess.php" );
		}
	} else {
		header ( "Location: ../newCategory.php" );
	}
}
else {
	header('../index.php?sess');
}
?>