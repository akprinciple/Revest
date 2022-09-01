</div>
</div>
</div>
</div>
</div>
    <!-- ==== #dashboard section end ==== -->

    

<!-- ==== footer section start ==== -->
    <footer class="footer dashboard-footer pos__rel over__hi">
        <div class="container">
            <div class="footer__area section__space">
                <div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="footer__intro">
                            <a href="index">
                                <img src="../assets/images/team/<?php 
                            $s= mysqli_query($connect, "SELECT image FROM users WHERE level = 1");
                            $r = mysqli_fetch_array($s);
                            echo $r['image'];
                        ?>" alt="Logo" class="logo" />
                            </a>
                            <p><i class="fa-solid fa-location-dot"></i>
                                <?php  
                                $select = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = 'address'");
                                foreach($select AS $key){
                                echo $key['content'];
                                }
                            ?>
                            </p>
                            <p><i class="fa-solid fa-phone"></i></i><?php  
                                $select = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = 'mobile_number'");
                                foreach($select AS $key){
                                echo $key['content'];
                                }
                            ?></p>
                            <p><i class="fa-solid fa-envelope"></i></i><?php  
                                $select = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = 'mail'");
                                foreach($select AS $key){
                                echo $key['content'];
                                }
                            ?></p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links footer__links--alt">
                            <h5>Company</h5>
                            <ul>
                                <li>
                                    <a href="../about-us">About Us</a>
                                </li>
                                <!-- <li>
                                    <a href="career">Careers</a>
                                </li>
                                <li>
                                    <a href="blog">Blog</a>
                                </li> -->
                                <li>
                                    <a href="../contact-us">Contact Us</a>
                                </li>
                                <li class="neutral-bottom">
                                    <a href="../affiliate-program">Affiliate</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links footer__links--alt">
                            <h5>Invest</h5>
                            <ul>
                                <li>
                                    <a href="../properties">Browse Properties</a>
                                </li>
                                <li>
                                    <a href="../how-it-works">How it works</a>
                                </li>
                                <!-- <li>
                                    <a href="loan-application">Loan Application </a>
                                </li> -->
                               <!--  <li>
                                    <a href="property-alert">Property Alerts</a>
                                </li> -->
                                <li class="neutral-bottom">
                                    <a href="../support">FAQs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links footer__links--alt--two">
                            <h5>Insights</h5>
                            <ul>
                                <li>
                                    <a href="../support">Help Center</a>
                                </li>
                                <!-- <li>
                                    <a href="../list-your-property">List Your Property</a>
                                </li> -->
                                <li class="neutral-bottom">
                                    <a href="../loyality-program">Loyality program </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
                        <div class="footer__links">
                            <h5>Legal</h5>
                            <ul>
                                <li>
                                    <a href="../privacy-policy">Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="../terms-conditions">Term & Conditions</a>
                                </li>
                                <li>
                                    <a href="../cookie-policy">Cookie Policy</a>
                                </li>
                                <li class="neutral-bottom">
                                    <a href="../key-risks">Key Risks</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__credit">
                <div class="row d-flex align-items-center">
                    <div class="col-md-8">
                        <div class="footer__copyright">
                            <p>Copyright &copy; Revest | Designed by <a
                                    href="https://themeforest.net/user/pixelaxis">Pixelaxis</a></p>
                        </div>
                    </div>
                    <div class="col-md-4">
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
            </div>
        </div>
    </footer>
    <!-- ==== #footer section end ==== -->
     <!-- Scroll To Top -->
    <a href="javascript:void(0)" class="scrollToTop">
        <i class="fa-solid fa-angles-up"></i>
    </a>