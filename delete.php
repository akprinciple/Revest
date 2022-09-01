<?php
include 'inc/session.php';
if (isset($_GET['del_user_id'])) {
	$id = $_GET['del_user_id'];
	$sql = mysqli_query($connect, "UPDATE users SET level = 2 WHERE md5(id) = '{$id}'");
	header('location: logout');
}




?>