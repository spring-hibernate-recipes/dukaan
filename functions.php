<?php
include_once ('config.php');
session_start ();

// error_reporting ( E_ALL );
// ini_set ( 'display_errors', 1 );
function startsWith($haystack, $needle) {
	$length = strlen ( $needle );
	return (substr ( $haystack, 0, $length ) === $needle);
}
function endsWith($haystack, $needle) {
	$length = strlen ( $needle );
	if ($length == 0) {
		return true;
	}
	
	return (substr ( $haystack, - $length ) === $needle);
}
function connect() {
	global $db_username, $db_password, $db_server, $db_name;
	$mysqli = mysqli_connect ( "$db_server", "$db_username", "$db_password", "$db_name" );
	return $mysqli;
}
function query($sql) {
	$con = connect ();
	$res = mysqli_query ( $con, $sql );
	$result = array ();
	while ( $record = mysqli_fetch_assoc ( $res ) ) {
		$result [] = $record;
	}
	mysqli_close ( $con );
	return $result;
}
function update($sql) {
	$con = connect ();
	$res = mysqli_query ( $con, $sql );
	mysqli_close ( $con );
	return $res;
}
function save($sql) {
	$con = connect ();
	mysqli_query ( $con, $sql );
	$id = mysqli_insert_id ( $con );
	mysqli_close ( $con );
	return $id;
}
function resizeImage($image, $width, $height, $scaleFactor) {
	$destImage = imagecreatetruecolor ( $width / $scaleFactor, $height / $scaleFactor );
	imagecopyresampled ( $destImage, $image, 0, 0, 0, 0, $width / $scaleFactor, $height / $scaleFactor, $width, $height );
	return $destImage;
}
function crop($image, $width, $height, $edge) {
	$destImage = imagecreatetruecolor ( $edge, $edge );
	imagecopyresampled ( $destImage, $image, 0, 0, ($width - $edge) / 2, ($height - $edge) / 2, $edge, $edge, $edge, $edge );
	return $destImage;
}
function sendStatusChangeMail($receiver, $sender, $statusFrom, $statusTo, $orderId) {
}
?>
