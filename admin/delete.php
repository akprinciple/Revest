<?php
include 'inc/session.php';
if (isset($_GET['del_property'])) {
	$id = $_GET['del_property'];
	$sql = mysqli_query($connect, "DELETE FROM properties WHERE md5(id) = '{$id}'");
	header('location: properties');
}
if (isset($_GET['del_earning'])) {
	$id = $_GET['del_earning'];
	$sql = mysqli_query($connect, "DELETE FROM earnings WHERE md5(id) = '{$id}'");
	header('location: earnings');
}
if (isset($_GET['del_faq'])) {
	$id = $_GET['del_faq'];
	$sql = mysqli_query($connect, "DELETE FROM faqs WHERE md5(id) = '{$id}'");
	header('location: faqs');
}
if (isset($_GET['del_user'])) {
	$id = $_GET['del_user'];
	$sql = mysqli_query($connect, "DELETE FROM users WHERE md5(id) = '{$id}'");
	header('location: account');
}

?>