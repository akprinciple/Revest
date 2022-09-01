<?php
	require '../inc/config.php';
	session_start();
 
    $user_check = $_SESSION['id'];

    $ses_sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '$user_check' && level = 1");
    $ses_row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    $login_id = $ses_row['id'];
    $ses_count = mysqli_num_rows($ses_sql);
    if (!isset($login_id)) {
      header("location: ../login");

    }
    if ($ses_count < 1) {
        header("location: ../login");
  
      }

    $_SESSION['id'] = $ses_row['id'];

?>