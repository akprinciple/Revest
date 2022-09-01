<?php 
 require 'inc/dynamic_session.php'; 
ob_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$msg = "";
if (isset($_POST['submit'])) {
$firstname = mysqli_real_escape_string($connect, $_POST['first__name']);
$lastname = mysqli_real_escape_string($connect, $_POST['last__name']);
$email = mysqli_real_escape_string($connect, $_POST['registration__email']);
$type = mysqli_real_escape_string($connect, $_POST['type']);
$password = mysqli_real_escape_string($connect, $_POST['regi__pass']);
$c_password = mysqli_real_escape_string($connect, $_POST['pass__con']);
$token = md5($firstname).rand(1000, 9999);
$date= date('d/M/Y');

if ($password != $c_password) {
$msg = "<div class='p-2 rounded text-danger text-center mb-2 mt-2'>Confirm Your Password</div>";
}
else{
$mail = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");
if (mysqli_num_rows($mail) > 0) {
$msg = "<div class='p-2 rounded text-danger text-center mb-2 mt-2'>The Email has been registered!</div>";
    
}else{



$sql = "INSERT INTO users(firstname, lastname, type, email, password, token, date) VALUES ('$firstname', '$lastname', '$type', '$email', '$password', '$token', '$date')";
$query = mysqli_query($connect, $sql);
if ($query) {
$fetch = mysqli_query($connect, "SELECT * FROM users WHERE email = '$email'");
$vet = mysqli_fetch_array($fetch);
$_SESSION['identity'] = $vet['id'];
// $msg = "You have Successfully Registered. You will be Redirected in a moment.";

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'akeemolayiwola09@gmail.com';                     //SMTP username
    $mail->Password   = 'mfuisaqtuzywwczf';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('akeemolayiwola09@gmail.com', 'Vikhomes');
    $mail->addAddress($email, $firstname);     //Add a recipient
    $mail->addAddress('akeemolayiwola09@gmail.com');               //Name is optional
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
    
    header('location: question_page');

    // echo 'Message has been sent';
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}    


}

}
}

}
// <script>setTimeout(function(){window.location='index-three'}, 3000)</script>



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

        <!-- ==== registration section start ==== -->
        <section class="registration clear__top">
            <div class="container">
                <div class="registration__area">
                    <h4 class="neutral-top">Registration</h4>
                    <p class="text-center">
                <?php echo $msg; ?>
                    
                </p>
                    <p>Already Registered? <a href="login">Login</a></p>
                    <form method="post" name="registration__form" enctype="multipart/form-data">
                        <div class="regi__type">
                            <label for="typeSelect">You are?</label>
                            <select class="type__select" name="type" id="typeSelect">
                                <option value="particular">Particular</option>
                                <option value="individual">Individual</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="firstName">First Name*</label>
                                    <input type="text" name="first__name" id="firstName" placeholder="First Name"
                                        required="required" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="lastName">Last Name*</label>
                                    <input type="text" name="last__name" id="lastName" placeholder="Last Name"
                                        required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="input input--secondary">
                            <label for="registrationMail">Email*</label>
                            <input type="email" name="registration__email" id="registrationMail"
                                placeholder="Enter your email" required="required" />
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="regiPass">Password*</label>
                                    <input type="password" name="regi__pass" id="regiPass" placeholder="Password"
                                        required="required" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="passCon">Password Confirmation*</label>
                                    <input type="password" minlength="6" name="pass__con" id="passCon" placeholder="Password Confirm"
                                        required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="condtion" name="accept__condition" value="agree" />
                                <span class="checkmark"></span>
                                I have read and I agree to the <a href="key-risks">
                                    Privacy Policy</a>
                            </label>
                        </div>
                        <div class="input__button">
                            <button type="submit" name="submit" class="button button--effect">Create My Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- ==== #registration section end ==== -->

        <!-- Scroll To Top -->
        <a href="javascript:void(0)" class="scrollToTop">
            <i class="fa-solid fa-angles-up"></i>
        </a>
    </div>

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