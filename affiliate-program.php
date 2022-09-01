<?php require 'inc/dynamic_session.php'; ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
      <?php require 'inc/toplink.php'; ?>

</head>

<body>

    <!-- ==== header start ==== -->
    <?php require 'inc/general_header.php'; ?>
   
    <!-- ==== #header end ==== -->

    <!-- ==== banner section start ==== -->
    <section class="banner key-banner banner--secondary clear__top bg__img"
        data-background="./assets/images/banner/program-bg.png">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top">Affiliate Program</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Affiliate Program
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <img src="assets/images/banner/affi-thumb.png" alt="Career" class="banner__thumb" />
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== market section start ==== -->
    <section class="market market__two section__space over__hi">
        <div class="container">
            <div class="market__area">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-xl-5">
                        <div class="market__thumb thumb__rtl column__space d-none d-lg-block">
                            <img src="assets/images/affiliate-illustration.png" alt="Affiliate Program" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 offset-xl-1">
                        <div class="content">
                            <h5 class="neutral-top">Earn Money</h5>
                            <h2>Affiliate Program</h2>
                            <p>Earn commission from every <?php 
                            $s= mysqli_query($connect, "SELECT firstname FROM users WHERE level = 1");
                            $r = mysqli_fetch_array($s);
                            echo $r['firstname'];
                        ?> new user you help to bring.Join our affiliate program,
                                refer your audience, and earn revenue.</p>
                            <a href="registration" class="button button--effect">Join As a Affiliate</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #market section end ==== -->

    <!-- ==== step two section start ==== -->
    <section class="step__two section__space__top bg__img" data-background="./assets/images/step-two-bg.png">
        <div class="container">
            <div class="step__two-area wow fadeInUp">
                <div class="section__header">
                    <h5 class="neutral-top">How the program Works</h5>
                    <h2>Start to make money in
                        3 easy steps</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-4">
                        <div class="step__two__single shadow__effect">
                            <img src="assets/images/icons/join.png" alt="Join" />
                            <h4>Join</h4>
                            <p class="neutral-bottom">It’s free to get started. Access marketing materials, tools, and
                                more!</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="step__two__single shadow__effect">
                            <img src="assets/images/icons/promote.png" alt="Promote" />
                            <h4>Promote</h4>
                            <p class="neutral-bottom">Share with your target audience. There’s a match for every need
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="step__two__single shadow__effect">
                            <img src="assets/images/icons/earn.png" alt="Earn" />
                            <h4>Earn</h4>
                            <p class="neutral-bottom">Rake in the moment your traffic converts. Check our commission
                                plans</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==== video popup section start ==== -->
        <div class="video video__two section__space__top">
            <div class="container">
                <div class="video__area">
                    <img src="assets/images/video-illustration.png" alt="Video Illustration" />
                    <div class="video__btn">
                        <a class="video__popup" href="<?php $sql = mysqli_query($connect, "SELECT video FROM properties WHERE status = 1 && video !='' ORDER BY rand() LIMIT 1");
                            foreach($sql AS $v){echo $v['video'];}
                         ?>" target="_blank"
                            title="YouTube video player">
                            <i class="fa-solid fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ==== #video popup section end ==== -->
    </section>
    <!-- ==== #step two section end ==== -->

    <!-- ==== testimonial section start ==== -->
    <section class="testimonial testimonial--two section__space pos__rel over__hi bg__img"
        data-background="./assets/images/testimonial/dot-map.png">
        <div class="container">
            <div class="testimonial__area">
                <div class="section__header">
                    <h5 class="neutral-top">Investors Trust Us</h5>
                    <h2>Trusted by Over 40,000 Worldwide
                        Customer since 2022</h2>
                    <p class="neutral-bottom">We divide each property into shares so anyone can get started. Kindly
                        check
                        out our Investors say about <?php 
                            $s= mysqli_query($connect, "SELECT firstname FROM users WHERE level = 1");
                            $r = mysqli_fetch_array($s);
                            echo $r['firstname'];
                        ?>.</p>
                </div>
                <div class="testimonial__item__wrapper">
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="./assets/images/testimonial/quote.png">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="assets/images/testimonial/avatar.png" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="./assets/images/testimonial/quote.png">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="assets/images/testimonial/avatar.png" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="./assets/images/testimonial/quote.png">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="assets/images/testimonial/avatar.png" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="./assets/images/testimonial/quote.png">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="assets/images/testimonial/avatar.png" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial__support">
                        <div class="testimonial__item bg__img" data-background="./assets/images/testimonial/quote.png">
                            <div class="testimonial__author__ratings">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                            </div>
                            <p class="tertiary">Very trustworthy and clearly platform to invest in real state. Safe
                                investment with monthly payouts. Really recommended!</p>
                            <div class="testimonial__author">
                                <div class="testimonial__author__info">
                                    <div class="avatar__wrapper">
                                        <img src="assets/images/testimonial/avatar.png" alt="Allan Murphy" />
                                    </div>
                                    <div>
                                        <h5>Allan Murphy</h5>
                                        <p class="neutral-bottom">United States</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #testimonial section end ==== -->

    <!-- ==== footer section start ==== -->
    <?php require 'inc/general_footer.php'; ?>
   <?php require 'inc/footlink.php'; ?>
</body>

</html>