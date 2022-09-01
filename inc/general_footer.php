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
            <div class="footer__area section__space">
                <div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="footer__intro">
                            <a href="index">
                              <img src="assets/images/team/<?php 
                            $s= mysqli_query($connect, "SELECT image FROM users WHERE level = 1");
                            $r = mysqli_fetch_array($s);
                            echo $r['image'];
                        ?>" alt="Logo" class="logo" />
                            </a>
                            <p><?php echo $website; ?> is a platform offering anyone the ability to invest and potentially earn money
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
                                    <a href="about-us">About Us</a>
                                </li>
                                <!-- <li>
                                    <a href="career">Careers</a>
                                </li>
                                <li>
                                    <a href="blog">Blog</a>
                                </li> -->
                                <li>
                                    <a href="contact-us">Contact Us</a>
                                </li>
                                <li class="neutral-bottom">
                                    <a href="affiliate-program">Affiliate</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links footer__links--alt">
                            <h5>Invest</h5>
                            <ul>
                                <li>
                                    <a href="properties">Browse Properties</a>
                                </li>
                                <li>
                                    <a href="how-it-works">How it works</a>
                                </li>
                                <!-- <li>
                                    <a href="loan-application">Loan Application </a>
                                </li>
                                <li>
                                    <a href="property-alert">Property Alerts</a>
                                </li> -->
                                <li class="neutral-bottom">
                                    <a href="support">FAQs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links footer__links--alt--two">
                            <h5>Insights</h5>
                            <ul>
                                <li>
                                    <a href="support">Help Center</a>
                                </li>
                               <!--  <li>
                                    <a href="list-your-property">List Your Property</a>
                                </li> -->
                                <li class="neutral-bottom">
                                    <a href="loyality-program">Loyality program </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links">
                            <h5>Legal</h5>
                            <ul>
                                <li>
                                    <a href="privacy-policy">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="terms-conditions">Term & Conditions</a>
                                </li>
                                <li>
                                    <a href="cookie-policy">Cookie Policy</a>
                                </li>
                                <li class="neutral-bottom">
                                    <a href="key-risks">Key Risks</a>
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
                            <p>Copyright &copy; <?php 
                           echo $website;
                        ?> | Designed by <a
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