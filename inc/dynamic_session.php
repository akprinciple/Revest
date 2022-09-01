<?php 

    session_start();
  include('inc/config.php');
  if(isset($_SESSION['id'])){
    $user_check = $_SESSION['id'];

    $ses_sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '$user_check'");
    $ses_row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
    $login_id = $ses_row['id'];
    $ses_count = mysqli_num_rows($ses_sql);

    $_SESSION['id'] = $ses_row['id'];
}
?>