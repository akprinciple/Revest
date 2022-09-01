<?php
include 'inc/session.php';
if (isset($_GET['app'])) {
	$id = $_GET['app'];
	$sql = mysqli_query($connect, "UPDATE properties SET status = 0 WHERE md5(id) = '{$id}'");
	header('location: edit_property?p_id='.$id.'&p_address='.urlencode($_GET['p_address']));
}elseif (isset($_GET['approve'])) {
	$id = $_GET['approve'];
	$sql = mysqli_query($connect, "UPDATE properties SET status = 1 WHERE md5(id) = '{$id}'");
	header('location: edit_property?p_id='.$id.'&p_address='.urlencode($_GET['p_address']));
}




?>