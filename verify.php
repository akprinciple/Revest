<?php require 'inc/dynamic_session.php';
	if (isset($_GET['email']) && isset($_GET['token'])) {
		$sql = mysqli_query($connect, "UPDATE users SET level = 0 WHERE email = '{$_GET['email']}' && token = '{$_GET['token']}'");
		if ($sql) {
			$query = mysqli_query($connect, "SELECT * FROM users WHERE email = '{$_GET['email']}' && token = '{$_GET['token']}'");
			$row = mysqli_fetch_array($query);
			$_SESSION['id'] = $row['id'];
			header('location: dashboard');
		}else{
			header('location: login');

		}
	}

 ?>