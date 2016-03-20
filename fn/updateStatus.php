<?php
include_once '../functions.php';

if (isset ( $_SESSION ["shopkeeperEmailAddress"] )) {
	$status = $_REQUEST ['status'];
	$id = $_REQUEST ['id'];
	
	$sql = "update `order` set status='$status' where orderId='$id'";
	$result = update ( $sql );
	if ($result) {
		header ( "Location: ../statusUpdateResult.php?success" );
	} else {
		header ( "Location: ../statusUpdateResult.php?failed" );
	}
} else {
	header ( 'Location: ../index.php?sess' );
}
?>