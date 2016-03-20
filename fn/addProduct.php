<?php
include_once '../functions.php';

if (isset ( $_SESSION ["shopkeeperEmailAddress"] )) {
	
	$uploadDir = "../../tempimages/";
	$imagesDir = "../../prodImages/";
	
	$timeAsHex = dechex ( microtime ( true ) );
	
	if ($_REQUEST ["name"] != null) {
		$name = $_REQUEST ["name"];
		$categoryId = $_REQUEST ["categoryId"];
		$unit = $_REQUEST ["unit"];
		$unitPrice = $_REQUEST ["unitPrice"];
		$stock = $_REQUEST ["stock"];
		$shopkeeper = $_SESSION ["shopkeeperEmailAddress"];
		$uploadedFile = $uploadDir . basename ( $_FILES ['image'] ['name'] );
		
		if (! move_uploaded_file ( $_FILES ['image'] ['tmp_name'], $uploadedFile )) {
			$imageUrl = NULL;
		} else {
			$imageUrl = $uploadedFile;
		}
		
		list ( $width, $height, $type, $attr ) = getimagesize ( $uploadedFile );
		if (endsWith ( $uploadedFile, ".jpg" ) || endsWith ( $uploadedFile, ".jpeg" )) {
			$image = imagecreatefromjpeg ( $uploadedFile );
		} else if (endsWith ( $uploadedFile, ".png" )) {
			$image = imagecreatefrompng ( $uploadedFile );
		}
		
		if ($type) {
			if ($width > $height) {
				$scaleFactor = $height / 800;
			} else {
				$scaleFactor = $width / 800;
			}
		}
		
		$scaled800 = resizeImage ( $image, $width, $height, $scaleFactor );
		$cropped800 = crop ( $scaled800, $width / $scaleFactor, $height / $scaleFactor, 800 );
		imagejpeg ( $cropped800, $imagesDir . $timeAsHex . ".jpg" );
		chmod ( $imagesDir . $timeAsHex . ".jpg", 0755 );
		
		$cropped200 = resizeImage ( $cropped800, 800, 800, 4 );
		imagejpeg ( $cropped200, $imagesDir . $timeAsHex . "_thumb.jpg" );
		chmod ( $imagesDir . $timeAsHex . "_thumb.jpg", 0755 );
		
		$imageUrl = $timeAsHex;
		
		unlink ( $uploadedFile );
		
		$sql = "insert into product (name, aliases, unit, unitPrice, stock, threshold, sellerEmail, categoryId, imageUrl) values ('$name', '$aliases', '$unit', '$unitPrice', '$stock', '0', '$shopkeeper', '$categoryId', '$imageUrl')";
		$pid = save ( $sql );
		if (! $pid) {
			header ( 'Location: ../addProductSuccess.php' );
		} else {
			header ( 'Location: ../newProduct.php' );
		}
	}
}
else {
	header('Location: ../index.php?sess');
}
?>