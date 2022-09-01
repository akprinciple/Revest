<?php require 'inc/dynamic_session.php'; ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <?php require 'inc/toplink.php'; ?>
   

</head>

<body>

    <?php require 'inc/general_header.php'; ?>
    
    <!-- ==== #header end ==== -->

    <!-- ==== banner section start ==== -->
    <section class="banner banner-three clear__top bg__img"
        data-background="./assets/images/banner/banner-three-bg.png">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top">How It Works</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            How It Works
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== video popup section start ==== -->
    <div class="video">
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

    <!-- ==== start step section start ==== -->
    <section class="section__space">
        <div class="container">
            <div class="start__area">
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="start__single__item column__space--secondary">
                            <div class="img__box">
                                <img src="assets/images/step/browse.png" alt="Browse Properties" />
                                <div class="step__count">
                                    <h4>01</h4>
                                </div>
                            </div>
                            <h4>Browse Properties</h4>
                            <p class="neutral-bottom">Select a property that fits your goal from our huge variety of
                                hand-picked properties.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="start__single__item column__space--secondary">
                            <div class="img__box arrow__container">
                                <img src="assets/images/step/invest.png" alt="View Details & Invest" />
                                <div class="step__count">
                                    <h4>02</h4>
                                </div>
                            </div>
                            <h4>View Details & Invest</h4>
                            <p class="neutral-bottom">View detailed metrics for that property like Rental Yield, etc.
                                and invest like institutions.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="start__single__item">
                            <div class="img__box">
                                <img src="assets/images/step/earn.png" alt="Earn and Track" />
                                <div class="step__count">
                                    <h4>03</h4>
                                </div>
                            </div>
                            <h4>Earn and Track</h4>
                            <p class="neutral-bottom">You have full visibility into the performance of your investment.
                                Track your total current.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #start step section end ==== -->

    <!-- ==== community section start ==== -->
    <section class="community section__space__top over__hi bg__img" data-background="./assets/images/community-bg.png">
        <div class="container">
            <div class="community__area">
                <div class="section__header">
                   <?php  
                                $select = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = 'how-it-works'");
                                foreach($select AS $key){
                                echo $key['content'];
                                }
                            ?>
                </div>
                <div class="comunity-wrapper section__space">
                    <div class="buttons">
                        <a href="registration" class="button button--effect">Become an Investor</a>
                    </div>
                    <div class="comunity-area">
                        <?php
                            $gallery = mysqli_query($connect, "SELECT * FROM gallery ORDER BY rand() LIMIT 20");
                            foreach($gallery AS $gal){
                        ?>
                        <div class="comunity-item"><img src="./assets/images/gallery/<?php echo $gal['name']; ?>" alt="comunity"></div>
                        <?php } ?>
                        
                    </div>
                    <div class="comunity-area two">
                        <?php
                            $gallery = mysqli_query($connect, "SELECT * FROM gallery ORDER BY rand() LIMIT 20");
                            foreach($gallery AS $gal){
                        ?>
                        <div class="comunity-item"><img src="./assets/images/gallery/<?php echo $gal['name']; ?>" alt="comunity"></div>
                        <?php } ?>
                        
                    </div>
                    <div class="comunity-area three">
                        <?php
                            $gallery = mysqli_query($connect, "SELECT image FROM properties ORDER BY rand() LIMIT 20");
                            foreach($gallery AS $gal){
                        ?>
                        <div class="comunity-item"><img src="./assets/images/property/<?php echo $gal['image']; ?>" alt="comunity"></div>
                        <?php } ?>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #community section end ==== -->

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
                        out our Investors say about <?php echo $website; ?>.</p>
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