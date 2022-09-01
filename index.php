<?php
    require 'inc/dynamic_session.php';
   
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    
    
   
    <?php require 'inc/toplink.php'; ?>

</head>

<body>

    <?php require 'inc/general_header.php'; ?>

    <!-- ==== hero section start ==== -->
    <section class="hero pos__rel over__hi bg__img" data-background="./assets/images/hero/light-bg.png">
        <div class="container">
            <div class="hero__area">
                <div class="row">
                    <div class="col-lg-6 col-xxl-5">
                        <div class="hero__content">
                            <h5 class="neutral-top">A smarter, better way to invest</h5>
                            <h1>Real Estate Investment For <span>Everyone</span> </h1>
                            <p class="primary neutral-bottom">
                                Buy shares of rental properties, earn monthly income, and watch your money grow
                            </p>
                            <div class="hero__cta__group">
                                <a href="properties" class="button button--effect">Start Exploring</a>
                                <!-- <a href="business-loan.html" class="button button--secondary button--effect">Get
                                    Funding</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-6 offset-xxl-1">
                        <div class="hero__illustration d-none d-lg-block">
                            <img src="assets/images/hero/hero-illustration.png" alt="Hero Illustration" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #hero section end ==== -->

    <!-- ==== property filter start ==== -->
    <div class="property__filter">
        <div class="container">
            <div class="property__filter__area">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-12 col-xl-6">
                        <div class="property__search__wrapper">
                            <form action="properties">
                                <div class="input">
                                    <input type="search" name="property__search" id="propertySearch"
                                        placeholder="Search for properties' address" required="required" />
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <button type="submit" class="button button--effect">Search</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-xl-3">
                        <div class="property__select__wrapper">
                        <form action="properties" class="border-0" id="form1">
                            
                            <select class="location__select" name="property_location">
                                <option data-display="Location">Select Location</option>
                               <option value="Los Angeles">Los Angeles</option>
                                <option value="San Francisco, CA">San Francisco, CA</option>
                                <option value="The Weldon">The Weldon</option>
                                <option value="San Diego">San Diego</option>
                            </select>
                        </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="property__select__wrapper">
                            
                            <select class="property__select" form="form1" name="property_type">
                                <option data-display="Property">Property Type</option>
                                <option value="commercial">Commercial</option>
                                <option value="residential">Residential</option>
                            </select>
                        </div><br>
                    </div>
                    <div class="col-md-10"></div>
                    <button type="submit" form="form1" class="button button--effect mt-2 col-md-2">Search</button>
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- ==== #property filter end ==== -->

    <!-- ==== featured properties section start ==== -->
    <section class="featured__properties section__space">
        <div class="container">
            <div class="featured__properties__area wow fadeInUp">
                <div class="title__with__cta">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                            <h2>Featured Properties</h2>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-start text-lg-end">
                                <a href="properties" class="button button--secondary button--effect">Browse All
                                    Properties</a>
                            </div>
                        </div>
                    </div>
                </div>

    <?php
        $sql = mysqli_query($connect, "SELECT * FROM properties WHERE status = 1 ORDER BY id DESC LIMIT 4");
        foreach ($sql as $key) {
            $i_total = mysqli_query($connect, "SELECT SUM(amount_invested) AS amount FROM investments WHERE property_id = '{$key['id']}' && status = 1");
            $i_sum = mysqli_fetch_array($i_total);
            $i_investors = mysqli_query($connect, "SELECT DISTINCT user_id FROM investments WHERE property_id = '{$key['id']}'");

            $i_count = mysqli_num_rows($i_investors);
    ?>
    <div class="property__list__wrapper">
        <div class="row d-flex align-items-center">
            <div class="col-lg-5">
                <div class="property__item__image column__space--secondary">
                    <div class="img__effect">
                        <a href="property-details?id=<?php echo md5($key['id']); ?>">
                            <img src="assets/images/property/<?php echo $key['image']; ?>" alt="<?php echo $key['image']; ?>" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="property__item__content">
                    <div class="item__head">
                        <div class="item__head__left">
                            <h4><?php echo $key['location']; ?></h4>
                            <p><i class="fa-solid fa-location-dot"></i><?php echo $key['address']; ?></p>
                        </div>
                        <div class="item__head__right">
                            <div class="countdown__wrapper">
                                <p class="secondary"><i class="fa-solid fa-clock"></i> Left to invest</p>
                                <div class="countdown">
                                    <h5>
                                        <span class="days">00</span><span class="ref">d</span>
                                        <span class="seperator">:</span>
                                    </h5>
                                    <h5>
                                        <span class="hours"> 00</span><span class="ref">h</span>
                                        <span class="seperator">:</span>
                                    </h5>
                                    <h5>
                                        <span class="minutes">00</span><span class="ref">m</span>
                                        <span class="seperator"></span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="progress__type progress__type--two">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="project__info">
                            <p class="project__has"><span class="project__has__investors"><?php echo $i_count; ?>
                                                Investor(s)</span> | <span class="project__has__investors__amount"><i
                                        class="fa-solid fa-dollar-sign"></i><?php echo number_format($i_sum['amount'],0 ); ?></span> <span
                                    class="project__has__investors__percent">(<?php echo number_format($i_sum['amount']*100/$key['price'], 2)  ; ?>%)</span></p>
                            <p class="project__goal">
                                <i class="fa-solid fa-dollar-sign"></i> <?php echo number_format($key['price']); ?> Goal
                            </p>
                        </div>
                    </div>
                    <div class="item__info">
                        <div class="item__info__single">
                            <p>Annual Return</p>
                            <h6><?php echo $key['returns']; ?>% + 3%</h6>
                        </div>
                        <div class="item__info__single">
                            <p>Maximum Term</p>
                            <h6><?php echo $key['term']; ?> Months</h6>
                        </div>
                        <div class="item__info__single">
                            <p>Property Type</p>
                            <h6><?php echo $key['type']; ?></h6>
                        </div>
                        <div class="item__info__single">
                            <p>Distribution</p>
                            <h6><?php echo $key['distribution']; ?></h6>
                        </div>
                    </div>
                    <div class="item__footer">
                        <div class="item__security">
                            <div class="icon__box">
                                <img src="assets/images/home.png" alt="Security" />
                            </div>
                            <div class="item__security__content">
                                <p class="secondary">Security</p>
                                <h6>1st-Rank Mortgage</h6>
                            </div>
                        </div>
                        <div class="item__cta__group">
                            <a href="property-details?id=<?php echo md5($key['id']); ?>#invest" class="button button--effect">Invest Now</a>
                            <a href="property-details?id=<?php echo md5($key['id']); ?>"
                                class="button button--secondary button--effect">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>

                
                        
                    
            </div>
        </div>
    </section>
    <!-- ==== #featured properties section end ==== -->

    <!-- ==== all properties in grid section start ==== -->
    <section class="properties__grid section__space">
        <div class="container">
            <div class="properties__grid__area wow fadeInUp">
                <div class="title__with__cta">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                            <h2>All Properties</h2>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-start text-lg-end">
                                <a href="properties" class="button button--secondary button--effect">Browse All
                                    Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="property__grid__wrapper">
                    <div class="row">
                 <?php
                    $sql = mysqli_query($connect, "SELECT * FROM properties WHERE status = 1 ORDER BY  rand() LIMIT 6");
                    foreach ($sql as $key) {
                        $i_total = mysqli_query($connect, "SELECT SUM(amount_invested) AS amount FROM investments WHERE property_id = '{$key['id']}' && status =1");
            $i_sum = mysqli_fetch_array($i_total);
            $i_investors = mysqli_query($connect, "SELECT DISTINCT user_id FROM investments WHERE property_id = '{$key['id']}'");

            $i_count = mysqli_num_rows($i_investors);
                     ?>
                        <div class="col-lg-4 col-xl-4">
                            <div class="property__grid__single">
                                <div class="img__effect" style="height: 250px; overflow-y: hidden;">
                                    <a href="property-details?id=<?php echo md5($key['id']); ?>">
                                        <img src="assets/images/property/<?php echo $key['image']; ?>" alt="<?php echo $key['image']; ?>" />
                                    </a>
                                </div>
                                <div class="property__grid__single__inner">
                                    <h4><?php echo $key['location']; ?></h4>
                                    <p class="sub__info"><i class="fa-solid fa-location-dot"></i> <?php echo $key['address']; ?></p>
                                    <div class="progress__type">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="project__has"><span class="project__has__investors"><?php echo $i_count; ?>
                                                Investor(s)</span> |
                                            <span class="project__has__investors__amount"><i
                                                    class="fa-solid fa-dollar-sign"></i><?php echo number_format($i_sum['amount'],0 ); ?></span> <span
                                                class="project__has__investors__percent">(<?php echo number_format($i_sum['amount']*100/$key['price'], 2)  ; ?>%)</span>
                                        </p>
                                    </div>
                                    <div class="item__info">
                                        <div class="item__info__single">
                                            <p>Annual Return</p>
                                            <h6><?php echo $key['returns']; ?>% + 4%</h6>
                                        </div>
                                        <div class="item__info__single">
                                            <p>Property Type</p>
                                            <h6><?php echo $key['type']; ?></h6>
                                        </div>
                                    </div>
                                    <div class="invest__cta__wrapper">
                                        <div class="countdown__wrapper">
                                            <p class="secondary"><i class="fa-solid fa-clock"></i> Left to invest</p>
                                            <div class="countdown">
                                                <h5>
                                                    <span class="days">00</span><span class="ref">d</span>
                                                    <span class="seperator">:</span>
                                                </h5>
                                                <h5>
                                                    <span class="hours"> 00</span><span class="ref">h</span>
                                                    <span class="seperator">:</span>
                                                </h5>
                                                <h5>
                                                    <span class="minutes">00</span><span class="ref">m</span>
                                                    <span class="seperator"></span>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="invest__cta">
                                            <a href="property-details?id=<?php echo md5($key['id']); ?>#invest" class="button button--effect">
                                                Invest Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php } ?>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #all properties in grid section end ==== -->

    <!-- ==== profit overview section start ==== -->
    <section class="profit section__space">
        <div class="container">
            <div class="profit__area wow fadeInUp">
                <div class="section__header">
                    <h5 class="neutral-top">Built to help smart investors invest smarter</h5>
                    <h2>We handle the heavy lifting so you
                        can sit back, relax, and profit.</h2>
                    <p class="neutral-bottom">We make institutional quality real estate accessible to investors, in a
                        simple
                        and transparent way.</p>
                </div>
                <div class="profit__item__wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="profit__single__item alt shadow__effect">
                                <div class="img__box">
                                    <img src="assets/images/overview/passive-income.png" alt="Passive Income" />
                                </div>
                                <div class="item__content">
                                    <h4>Passive Income</h4>
                                    <p>Earn rental income and receive deposits quarterly</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profit__single__item shadow__effect">
                                <div class="img__box">
                                    <img src="assets/images/overview/secure.png" alt="secure" />
                                </div>
                                <div class="item__content">
                                    <h4>Secure & Cost-efficient</h4>
                                    <p>Digital security is legally compliant and tangible for qualified investors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="profit__item__wrapper">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="profit__single__item alt shadow__effect">
                                <div class="img__box">
                                    <img src="assets/images/overview/transparency.png" alt="Transparency" />
                                </div>
                                <div class="item__content">
                                    <h4>Transparency</h4>
                                    <p>Easily consult the full documentation for each property.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profit__single__item shadow__effect">
                                <div class="img__box">
                                    <img src="assets/images/overview/support.png" alt="Support" />
                                </div>
                                <div class="item__content">
                                    <h4>Support</h4>
                                    <p>Earn rental income and receive deposits quarterly</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #profit overview section end ==== -->

    <!-- ==== start step section start ==== -->
    <section class="start section__space__top bg__img" data-background="./assets/images/step/start-bg.png">
        <div class="container">
            <div class="start__area wow fadeInUp">
                <div class="section__header">
                    <h5 class="neutral-top">We're changing the way you invest.</h5>
                    <h2>It's Easy to Get Started.</h2>
                    <p class="neutral-bottom">Signing up with <?php echo $website; ?> is simple and only takes a few minutes. We can
                        automatically connect with more than 3,500 banks, so no complicated paperwork is required to
                        fund your account.</p>
                </div>
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

    <!-- ==== numbers section start ==== -->
    <section class="numbers section__space bg__img" data-background="./assets/images/globe.png">
        <div class="container">
            <div class="numbers__area wow fadeInUp">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="content column__space">
                            <h5 class="neutral-top">With <?php echo $website; ?> anyone can invest!</h5>
                            <h2>Numbers Said
                                More Than Words</h2>
                            <p>our low minimums give you the flexibility to invest the right amount, at the right time,
                                to meet your goals.</p>
                            <a href="properties" class="button button--effect">Start Exploring</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row d-flex align-items-start align-items-lg-center">
                            <div class="col-sm-6">
                                <div class="numbers__single shadow__effect">
                                    <img src="assets/images/platforms.png" alt="platform" />
                                    <h3><span class="counter">3000</span>+</h3>
                                    <p class="neutral-bottom">Investors Using Platform</p>
                                </div>
                                <div class="numbers__single shadow__effect__secondary">
                                    <img src="assets/images/returns.png" alt="Returns" />
                                    <h3><span class="counter">18</span>%</h3>
                                    <p class="neutral-bottom">Returns upto</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="numbers__single alt shadow__effect__secondary">
                                    <img src="assets/images/experience.png" alt="Experience" />
                                    <h3 class="counter">45</h3>
                                    <p class="neutral-bottom">Years Experience</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #numbers section end ==== -->

    <!-- ==== testimonial section start ==== -->
    <section class="testimonial section__space pos__rel over__hi bg__img"
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

    <!-- ==== market section start ==== -->
    <section class="market section__space over__hi">
        <div class="container">
            <div class="market__area">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-xl-5">
                        <div class="market__thumb thumb__rtl column__space">
                            <img src="assets/images/market-illustration.png" alt="Explore the Market" />
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-6 offset-xl-1">
                        <div class="content">
                            <h5 class="neutral-top">Real exposure to the real estate market</h5>
                            <h2>You Invest. <?php echo $website; ?>
                                Does the Rest</h2>
                            <p>Transparent Real Estate Investing Through <?php echo $website; ?>.Join us and
                                experience a smarter,better way to invest in real estate</p>
                            <a href="properties" class="button button--effect">Start Exploring</a>
                            <img src="assets/images/arrow.png" alt="Go to" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #market section end ==== -->

   

    <?php require 'inc/general_footer.php'; ?>
    <?php require 'inc/footlink.php'; ?>

</body>

</html>