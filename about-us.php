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
    <section class="banner clear__top bg__img" data-background="./assets/images/banner/banner-bg.png">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            About Us
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== about overview section start ==== -->
    <section class="about__overview">
        <div class="video video--secondary">
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
        <div class="container">
            <div class="about__overview__area">
                <div class="section__header">
                   <?php  
                                $select = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = 'about us'");
                                foreach($select AS $key){
                                echo $key['content'];
                                }
                            ?>
                </div>
                <div class="portfolio__overview">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="portfolio__overview__single column__space">
                                <img src="assets/images/icons/investors.png" alt="Investors" />
                                <div>
                                    <h2 class="counterTwo">6738</h2>
                                    <p>Investors</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="portfolio__overview__single column__space">
                                <img src="assets/images/icons/completed.png" alt="completed" />
                                <div>
                                    <h2 class="counterTwo">61316</h2>
                                    <p>Investments Completed</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="portfolio__overview__single">
                                <img src="assets/images/icons/annual-return.png" alt="Average Annual Return" />
                                <div>
                                    <h2><span class="counterTwo">10.36</span>%</h2>
                                    <p>Average Annual Return</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #about overview section end ==== -->

    <!-- ==== image gallery section start ==== -->
    <div class="image__gallery section__space">
        <div class="image__gallery__area">
            <div class="gallery__single">
                <a href="assets/images/one.png">
                    <img src="assets/images/one.png" alt="Proect Image" />
                </a>
            </div>
            <div class="gallery__single">
                <a href="assets/images/two.png">
                    <img src="assets/images/two.png" alt="Proect Image" />
                </a>
            </div>
            <div class="gallery__single">
                <a href="assets/images/three.png">
                    <img src="assets/images/three.png" alt="Proect Image" />
                </a>
            </div>
            <div class="gallery__single">
                <a href="assets/images/one.png">
                    <img src="assets/images/one.png" alt="Proect Image" />
                </a>
            </div>
            <div class="gallery__single">
                <a href="assets/images/two.png">
                    <img src="assets/images/two.png" alt="Proect Image" />
                </a>
            </div>
            <div class="gallery__single">
                <a href="assets/images/three.png">
                    <img src="assets/images/three.png" alt="Proect Image" />
                </a>
            </div>
        </div>
    </div>
    <!-- ==== #image gallery section end ==== -->

    <!-- ==== team section start ==== -->
    <section class="team section__space__bottom">
        <div class="container">
            <div class="team__area wow fadeInUp">
                <div class="section__header">
                    <h5 class="neutral-top">Meet Our Incredible Team</h5>
                    <h2>Built by a Diverse Team With Deep
                        Expertise in Investing</h2>
                    <p class="neutral-bottom">We're on a mission to build a better financial system by empowering the
                        individual.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="team__single shadow__effect">
                            <div class="team__thumb">
                                <img src="assets/images/team/paul.png" alt="Paul" />
                                <a href="#0">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                            <h5 class="neutral-top">Paul Smith</h5>
                            <p class="neutral-bottom">Founder & CEO</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="team__single shadow__effect">
                            <div class="team__thumb">
                                <img src="assets/images/team/ryan.png" alt="Ryan Jackson" />
                                <a href="#0">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                            <h5 class="neutral-top">Ryan Jackson</h5>
                            <p class="neutral-bottom">Head of Business Operations</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="team__single shadow__effect">
                            <div class="team__thumb">
                                <img src="assets/images/team/rosen.png" alt="Brittany Rosen" />
                                <a href="#0">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                            <h5 class="neutral-top">Brittany Rosen</h5>
                            <p class="neutral-bottom">VP, Finance and Strategy</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="team__single shadow__effect">
                            <div class="team__thumb">
                                <img src="assets/images/team/robert.png" alt="Robert Henriks" />
                                <a href="#0">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                            <h5 class="neutral-top">Robert Henriks</h5>
                            <p class="neutral-bottom">Senior Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #team section end ==== -->

    <!-- ==== market section start ==== -->
    <section class="market market--two market--three section__space__bottom mb-5">
        <div class="container">
            <div class="market__area market__area--two section__space bg__img"
                data-background="./assets/images/light-two.png">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="content">
                            <h5 class="neutral-top">Real exposure to the real estate market</h5>
                            <h2>You Invest. <?php 
                            $s= mysqli_query($connect, "SELECT firstname FROM users WHERE level = 1");
                            $r = mysqli_fetch_array($s);
                            echo $r['firstname'];
                        ?>
                                Does the Rest</h2>
                            <p>Transparent Real Estate Investing Through <?php 
                            $s= mysqli_query($connect, "SELECT firstname FROM users WHERE level = 1");
                            $r = mysqli_fetch_array($s);
                            echo $r['firstname'];
                        ?>.Join us and
                                experience a smarter,better way to invest in real estate</p>
                            <a href="properties" class="button button--effect">Start Exploring</a>
                            <img src="assets/images/arrow.png" alt="Go to" />
                        </div>
                    </div>
                </div>
                <img src="assets/images/market-two-illustration.png" alt="Explore the Market"
                    class="d-none d-lg-block market__two__thumb" />
            </div>
            <div class="market__features">
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="market__features__single shadow__effect__secondary">
                            <img src="assets/images/icons/gain.png" alt="Gain Instant" />
                            <h4>Gain Instant</h4>
                            <p class="neutral-bottom"><?php 
                            $s= mysqli_query($connect, "SELECT firstname FROM users WHERE level = 1");
                            $r = mysqli_fetch_array($s);
                            echo $r['firstname'];
                        ?> performs deep due diligence on sponsors, giving investors
                                peace of mind.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="market__features__single market__features__single--alt shadow__effect">
                            <img src="assets/images/icons/noticed.png" alt="Get noticed" />
                            <h4>Get Noticed</h4>
                            <p class="neutral-bottom"><?php 
                            $s= mysqli_query($connect, "SELECT firstname FROM users WHERE level = 1");
                            $r = mysqli_fetch_array($s);
                            echo $r['firstname'];
                        ?> VERIFIED sponsor profiles are available to accredited real
                                estate investment
                                investors.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="market__features__single alt shadow__effect__secondary">
                            <img src="assets/images/icons/focus.png" alt="Focus on Deals" />
                            <h4>Focus on Deals</h4>
                            <p class="neutral-bottom">Spend less time smiling, reaserching and dialing and more time
                                doing what you love.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- ==== #market section end ==== -->

    <!-- ==== open job section start ==== -->
  
    <!-- ==== #open job section end ==== -->

    <!-- ==== footer section start ==== -->
    <?php require 'inc/general_footer.php'; ?>
   <?php require 'inc/footlink.php'; ?>

</body>

</html>