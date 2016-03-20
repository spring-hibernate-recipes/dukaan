<?php
include_once '../functions.php';

if (isset ( $_SESSION ["shopkeeperEmailAddress"] )) {
	$id = $_REQUEST ["id"];
	$stock = $_REQUEST ["stock"];
	$unitPrice = $_REQUEST ["unitPrice"];
	
	$sql = "update product set stock='$stock', unitPrice='$unitPrice' where id='$id'";
	$result = update ( $sql );
	
	if ($result) {
		header ( "Location: ../stock.php?success" );
	} else {
		header ( "Location: ../stock.php?err" );
	}
} else {
	header ( 'Location: ../index.php?sess' );
}
?>