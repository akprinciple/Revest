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
    <section class="banner banner--secondary key-banner banner-three clear__top bg__img"
        data-background="./assets/images/banner/program-bg.png">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top">Loyality Program</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Loyality Program
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <img src="assets/images/banner/program-illustration.png" alt="Career" class="banner__thumb" />
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== video popup section start ==== -->
    <div class="video">
        <div class="container">
            <div class="video__area">
                <img src="assets/images/video-illustration.png" alt="Video Illustration" />
                <div class="video__btn">
                    <a class="video__popup" 
                    href="<?php $sql = mysqli_query($connect, "SELECT video FROM properties WHERE status = 1 && video !='' ORDER BY rand() LIMIT 1");
                            foreach($sql AS $v){echo $v['video'];}
                         ?>" 
                         target="_blank"
                        title="YouTube video player">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ==== #video popup section end ==== -->

    <!-- ==== program section start ==== -->
    <section class="program section__space">
        <div class="container">
            <div class="program__area wow fadeInUp">
                <div class="section__header">
                    <h2 class="neutral-top">Loyalty Program</h2>
                    <p class="neutral-bottom"><?php echo $website; ?> Loyalty Program aims to reward our most active and larger
                        investors, whilst at the same time encouraging investors to minimize risk by spreading their
                        investments into multiple investment opportunities.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xl-3">
                        <div class="program__single shadow__effect">
                            <div class="box">
                                <h3><span class="counterFive">10</span>%</h3>
                            </div>
                            <h5>STARTER</h5>
                            <p class="neutral-bottom">10% discount when participating in 25 opportunities or at least
                                $25,000 invested.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="program__single shadow__effect">
                            <div class="box">
                                <h3><span class="counterFive">20</span>%</h3>
                            </div>
                            <h5>Premium</h5>
                            <p class="neutral-bottom">20% discount when participating in 25 opportunities or at least
                                $25,000 invested.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="program__single shadow__effect">
                            <div class="box">
                                <h3><span class="counterFive">30</span>%</h3>
                            </div>
                            <h5>Platinum</h5>
                            <p class="neutral-bottom">30% discount when participating in 25 opportunities or at least
                                $25,000 invested.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="program__single shadow__effect">
                            <div class="box">
                                <h3><span class="counterFive">40</span>%</h3>
                            </div>
                            <h5>Diamond</h5>
                            <p class="neutral-bottom">40% discount when participating in 25 opportunities or at least
                                $25,000 invested.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #program section end ==== -->

    <!-- ==== footer section start ==== -->
    
   <?php require 'inc/general_footer.php'; ?>
   <?php require 'inc/footlink.php'; ?>

</body>

</html>