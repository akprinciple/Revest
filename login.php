<?php
require 'inc/dynamic_session.php';
    

        $msg = $email = $password = $code = "";

        if (isset($_POST['submit'])) {
            $email = mysqli_real_escape_string($connect, $_POST['login__email']);
            $password = mysqli_real_escape_string($connect, $_POST['login__pass']);
            $date = date('d.m.Y');
            $time = date('h.i.sa');

            $sql = "SELECT * FROM users WHERE email = '{$email}' && password = '{$password}'";
            $query = mysqli_query($connect, $sql);
            $counts = mysqli_num_rows($query);
            $row = mysqli_fetch_array($query);
            if ($counts > 0) {
            
            

                
                $_SESSION['id'] = $row['id'];
                $update = mysqli_query($connect, "UPDATE users SET l_date = '{$date}', time ='{$time}' WHERE id = '{$row['id']}'");
                if ($row['level'] == 1) {
                header('location: admin');
                    
                }elseif ($row['level'] == 0){
                header('location:dashboard');
                }elseif ($row['level'] == 2){
                header('location:verification');
                }
                else{
                header('location: 404');

                }
            }
            else{
                $msg = "<small class='text-danger'>Wrong email or password</small>";
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
                <div class="registration__area">
                    <h4 class="neutral-top">Log in</h4>
                    <?php echo $msg; ?>
                    <p>Don't have an account? <a href="registration">Register here.</a></p>
                    <form method="post" name="login__form" class="form__login">
                        <div class="input input--secondary">
                            <label for="loginMail">Email*</label>
                            <input type="email" name="login__email" value="<?php echo $email; ?>" id="loginMail" placeholder="Enter your email"
                                required="required" />
                        </div>
                        <div class="input input--secondary">
                            <label for="loginPass">Password*</label>
                            <input type="password" name="login__pass" id="loginPass" placeholder="Password"
                                required="required" />
                        </div>
                        <div class="checkbox login__checkbox">
                            <label>
                                <input type="checkbox" id="remeberPass" name="remeber__pass" value="remember" />
                                <span class="checkmark"></span>
                                Remember Me
                            </label>
                            <a href="javascript:void(0)">Forget Password</a>
                        </div>
                        <div class="input__button">
                            <button type="submit" name="submit" class="button button--effect">Login</button>
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