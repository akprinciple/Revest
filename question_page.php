<?php
require 'inc/dynamic_session.php';
    

        $msg = $email = $password = $code = "";

        if (isset($_POST['submit'])) {
            $q1 = mysqli_real_escape_string($connect, $_POST['q1']);
            $q2 = mysqli_real_escape_string($connect, $_POST['q2']);
            $q3 = mysqli_real_escape_string($connect, $_POST['q3']);
            $q4 = mysqli_real_escape_string($connect, $_POST['q4']);
            $user = $_SESSION['identity'];

            $sql = mysqli_query($connect, "INSERT INTO answers (user_id, q1, q2, q3, q4) VALUES('$user', '$q1', '$q2', '$q3', '$q4')");
           if ($sql) {
               // $_SESSION['id'] = $_SESSION['identity'];
               $msg = "Your registration was successful. You will be redirected in a moment";
               echo "<script>setTimeout(function(){window.location='verification'}, 5000)</script>";
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

        <!-- ==== registration section start ==== -->
        <section class="registration clear__top">
            <div class="container">

                <div class="registration__area" style="max-width: 800px; text-align: left;">
                    <h4 class="neutral-top">Please fill in the form below</h4>
                    <div class="text-center"><?php echo $msg; ?></div>
                    <p>
                        <div class="account-info" style="box-shadow: 0px 4px 26px rgba(165, 163, 235, 0);border-radius: 0px;">
                    <div class="account-info__btn-wrapper">
                        <a href="#Q1"
                            class="account-info__btn account-info__btn-active button button--effect">Q1</a>
                        <a href="#Q2" class="account-info__btn button button--effect">Q2</a>
                        <a href="#Q3" class="account-info__btn button button--effect">Q3</a>
                        <a href="#Q4" class="account-info__btn button button--effect">Q4</a>
                    </div>
                </div>
                   
                    </p>
                    <form method="post">
                     <div class="account-content_wrapper">
                        <div class="account-content" id="Q1">
                        <div class="input input--secondary">
                            <label for="">Question 1</label>
                            <p>When it comes to real estate investing, how much previous experience do you?</p>
                        </div>
                        <div class="checkbox p-3 border rounded mb-3">
                            
                            <input type="radio" style="position: static; width: 5%" class=" checkmark" style="" name="q1" id="a1" required="required" value="I'm just getting started" />
                            
                            <label for="a1" class="k"  style="width: 90%; vertical-align: text-top;">I'm just getting started</label>
                            
                        </div>
                         <div class="checkbox p-3 border rounded mb-3">
                            <input type="radio" style="position: static;" class=" checkmark" style="" name="q1" id="b1" required="required" value="I've made a few, yeah!" />
                            <label for="b1"  style="width: 90%">I've made a few, yeah!</label>
                            
                        </div>

                         <div class="checkbox p-3 border rounded mb-3">
                            <input type="radio" style="position: static;" class=" checkmark" style="" name="q1" id="c1" required="required" value="Been there, Done that." />
                            <label for="c1"  style="width: 90%">Been there, Done that.</label>
                            
                        </div>
                        <center>
                        <a href="#Q2" class="account-info__btn button button--effect text-center">NEXT</a>
                        </center>                       
                        
                    </div>
                    <div class="account-content" id="Q2">
                        <div class="input input--secondary">
                            <label for="">Question 2</label>
                            <p>My current Investment goals are:</p>
                        </div>
                        <div class="checkbox p-3 border rounded mb-3">
                            
                            <input type="radio" style="position: static; width: 5%" class=" checkmark" style="" name="q2" id="a2" required="required" value="I need liquidity and havea short to medium-term horizon" />
                            
                            <label for="a2" class="k"  style="width: 90%; vertical-align: text-top;">I need liquidity and havea short to medium-term horizon</label>
                            
                        </div>
                         <div class="checkbox p-3 border rounded mb-3">
                            <input type="radio" style="position: static;" class=" checkmark" style="" name="q2" id="b2" required="required" value="I have a lot of patience and a long term horizon" />
                            <label for="b2"  style="width: 90%">I have a lot of patience and a long term horizon</label>
                            
                        </div>

                         <div class="checkbox p-3 border rounded mb-3">
                            <input type="radio" style="position: static;" class=" checkmark" style="" name="q2" id="c2" required="required" value="I'm interested in exploring my options" />
                            <label for="c2"  style="width: 90%">I'm interested in exploring my options</label>
                            
                        </div>

                           <center>
                            
                        <a href="#Q3" class="account-info__btn button button--effect text-center">NEXT</a>
                        </center>                     
                        
                    </div>
                    <div class="account-content" id="Q3">
                        <div class="input input--secondary">
                            <label for="">Question 3</label>
                            <p>Investments need time to develop. What is your investment horion?</p>
                        </div>
                        <div class="checkbox p-3 border rounded mb-3">
                            
                            <input type="radio" style="position: static; width: 5%" class=" checkmark" style="" name="q3" id="a3" required="required" value="3-12 months" />
                            
                            <label for="a3" class="k"  style="width: 90%; vertical-align: text-top;">3-12 months</label>
                            
                        </div>
                         <div class="checkbox p-3 border rounded mb-3">
                            <input type="radio" style="position: static;" class=" checkmark" style="" name="q3" id="b3" required="required" value="1-5 years" />
                            <label for="b3"  style="width: 90%">1-5 years</label>
                            
                        </div>

                         <div class="checkbox p-3 border rounded mb-3">
                            <input type="radio" style="position: static;" class=" checkmark" style="" name="q3" id="c3" required="required" value="5+ years" />
                            <label for="c3"  style="width: 90%">5+ years</label>
                            
                        </div>

                         
                        <center>
                            
                        <a href="#Q4" class="account-info__btn button button--effect text-center">NEXT</a>
                        </center>
                    </div>
                    <div class="account-content" id="Q4">
                        <div class="input input--secondary">
                            <label for="">Question 4</label>
                            <p>How much are you looking to invest?</p>  
                        </div>
                        <div class="checkbox p-3 border rounded mb-3">
                            
                            <input type="radio" style="position: static; width: 5%" class=" checkmark" style="" name="q4" id="a4" required="required" value="$5,000-$10,000" />
                            
                            <label for="a4" class="k"  style="width: 90%; vertical-align: text-top;">$5,000-$10,000</label>
                            
                        </div>
                         <div class="checkbox p-3 border rounded mb-3">
                            <input type="radio" style="position: static;" class=" checkmark" style="" name="q4" id="b4" required="required" value="$10,000-$100,000" />
                            <label for="b4"  style="width: 90%">$10,000-$100,000</label>
                            
                        </div>

                         <div class="checkbox p-3 border rounded mb-3">
                            <input type="radio" style="position: static;" class=" checkmark" style="" name="q4" id="c4" required="required" value="$100,000+" />
                            <label for="c4"  style="width: 90%">$100,000+</label>
                            
                        </div>

                         <div class="input__button">
                            <button type="submit" name="submit" class="button button--effect">Submit</button>
                        </div>
                       
                    </div>
                        
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