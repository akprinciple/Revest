<?php 
  session_start();
  include('inc/config.php');
  if (isset($_SESSION['id'])) {
  $user_check = $_SESSION['id'];
  }elseif (!isset($_SESSION['id'])) {
  header("location: login");
  }

  $ses_sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '$user_check'");
  $ses_row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
  $login_id = $ses_row['id'];
  $ses_count = mysqli_num_rows($ses_sql);
  if (!isset($login_id)) {
  header("location: login");
  }if ($ses_row['level']==2) {
  header("location: verification");
  }
  elseif ($ses_count < 1) {
  header("location: login");
  }
  $_SESSION['id'] = $ses_row['id'];
?>