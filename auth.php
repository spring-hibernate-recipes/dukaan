<?php
include_once ("functions.php");

$query = "select * from shopkeeper where emailAddress='$_REQUEST[emailAddress]' and password='$_REQUEST[password]'";

$result = query ( $query );

if ($result != null && count ( $result ) >= 1) {
	$_SESSION ["shopkeeperEmailAddress"] = "$_REQUEST[emailAddress]";
	header ( 'Location: home.php' );
} else {
	header ( 'Location: index.php?err' );
}
?>

