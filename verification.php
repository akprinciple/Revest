<?php
require 'inc/dynamic_session.php';
  //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
$msg = "";
if (isset($_SESSION['id'])) {
$sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '{$_SESSION['id']}'");
    
}else{
$sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '{$_SESSION['identity']}'");
}
$row = mysqli_fetch_array($sql);
$firstname = $row['firstname'];
$email = $row['email'];
$token = $row['token'];

if ($row['level'] == 0) {
    header('location: index');
}
if (isset($_POST['submit'])) {
//Create an instance; passing `true` enables exceptions


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'vikhomes.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'admin@vikhomes.com';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('admin@vikhomes.com', 'Vikhomes');
    $mail->addAddress($email, $firstname);     //Add a recipient
    $mail->addAddress('admin@vikhomes.com');               //Name is optional
    // $mail->addReplyTo('akeemolayiwola09@gmail.com', 'Vikhomes');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Vikhomes verification link';
    $mail->Body    = 'Dear <b>'. $firstname.' </b>, You are Successfully registered on vikhomes. Click on the link below to verify your account. <a href="vikhomes.com/verify?email='.$email.'&&token='.$token.'">
    vikhomes.com/verify?email='.$email.'&&token='.$token.'
    </a>';

    $mail->AltBody = 'Dear <b>'. $firstname.' </b>, You are Successfully registered on vikhomes. Click on the link below to verify your account. <a href="vikhomes.com/verify?email='.$email.'&&token='.$token.'">
    vikhomes.com/verify?email='.$email.'&&token='.$token.'
    </a>';

    $mail->send();
    

    // echo 'Message has been sent';
}
 catch (Exception $e) {
    $msg = "Message could not be sent. Contact your administrator for assistance. Mailer Error: {$mail->ErrorInfo}";
}    

          }          
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <?php require 'inc/toplink.php' ?>
   
</head>

<body>

    <div class="wrapper bg__img" data-background="./assets/images/registration-bg.png">
        <!-- ==== header start ==== -->
        <header class="header header--secondary">
            <nav class="navbar navbar-expand-xl">
                <div class="container">
                    <a class="navbar-brand" href="index">
                         <img src="assets/images/team/<?php 
                            $s= mysqli_query($connect, "SELECT image FROM users WHERE level = 1");
                            $r = mysqli_fetch_array($s);
                            echo $r['image'];
                        ?>" alt="Logo" class="logo" />
                    </a>
                    <div class="navbar__out order-2 order-xl-3">
                        <div class="nav__group__btn">
                            <a href="login" class="log d-none d-sm-block"> Log In </a>
                            <a href="registration" class="button button--effect d-none d-sm-block"> Join Now <i
                                    class="fa-solid fa-arrow-right-long"></i> </a>
                        </div>
                        <button class="navbar-toggler d-block d-sm-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#primaryNav" aria-controls="primaryNav" aria-expanded="false"
                            aria-label="Toggle Primary Nav">
                            <span class="icon-bar top-bar"></span>
                            <span class="icon-bar middle-bar"></span>
                            <span class="icon-bar bottom-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse order-3 order-xl-2" id="primaryNav">
                        <ul class="navbar-nav">
                            <li class="nav-item d-block d-sm-none">
                                <a href="login" class="nav-link">Log In</a>
                            </li>
                            <li class="nav-item d-block d-sm-none">
                                <a href="registration" class="button button--effect button--last">Join Now <i
                                        class="fa-solid fa-arrow-right-long"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- ==== #header end ==== -->
          <?php
            echo $msg;
          ?>
        <!-- ==== registration section start ==== -->
        <section class="registration clear__top">
            <div class="container">
                <div class="col-md-6 mx-auto p-3 text-light" style="background-color: rgba(0,0,0,0.64); line-height: 2">
                    You are seeing this page because you are yet to verify your account. A link has been sent to your email to verify your account
                    <span id="show" style="display: none" class="text-light">or 
                        <form method="post"style="display: inline;"><button type="submit" name="submit" class="btn btn-light">click here </button></form> 
                        to Re-send the link
                    </span>
                    <span id="resend" class="text-light">The resend button will be available after 60s</span>.
                </div>
                </div>
        </section>
        <!-- ==== #registration section end ==== -->

        <!-- Scroll To Top -->
        <a href="javascript:void(0)" class="scrollToTop">
            <i class="fa-solid fa-angles-up"></i>
        </a>

    </div>
<script type="text/javascript">
    setTimeout(function(){
        document.getElementById("show").style.display="inline";
        document.getElementById("resend").style.display="none";
    }, 60000)
</script>
    <!-- ==== js dependencies start ==== -->

    <!-- jquery -->
    <script src="assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <!-- bootstrap five js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- nice select js -->
    <script src="assets/vendor/nice-select/js/jquery.nice-select.min.js"></script>
    <!-- magnific popup js -->
    <script src="assets/vendor/magnific-popup/js/jquery.magnific-popup.min.js"></script>
    <!-- slick js -->
    <script src="assets/vendor/slick/js/slick.js"></script>
    <!-- shuffle js -->
    <script src="assets/vendor/shuffle/shuffle.min.js"></script>
    <!-- jquery downcount timer -->
    <script src="assets/vendor/downcount/jquery.downCount.js"></script>
    <!-- waypoints js -->
    <script src="assets/vendor/waypoints-js/jquery.waypoints.min.js"></script>
    <!-- counter up js -->
    <script src="assets/vendor/counter-js/jquery.counterup.min.js"></script>
    <!-- apex chart js -->
    <script src="assets/vendor/apex-chart/apexcharts.min.js"></script>
    <!-- wow js -->
    <script src="assets/vendor/wow/wow.min.js"></script>

    <!-- ==== js dependencies end ==== -->

    <!-- plugin js -->
    <script src="assets/js/plugin.js"></script>
    <!-- main js -->
    <script src="assets/js/main.js"></script>

</body>

</html>