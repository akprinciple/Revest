<!-- ==== header start ==== --> 
    <header class="header">
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
                        <?php 
                            if (!isset($_SESSION['id'])) {
                               
                            
                         ?>
                        <a href="login" class="log d-none d-sm-block"> Log In </a>
                        <a href="registration" class="button button--effect d-none d-sm-block"> Join Now <i
                                class="fa-solid fa-arrow-right-long"></i> </a>
                        <?php }else{ ?>
                             <a href="logout" class="btn btn-lg button--effect d-none d-sm-block btn-danger">Log out <i
                                class="fa-solid fa-arrow-right-long"></i> </a>
                        <?php } ?>
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
                            <a class="nav-link" href="index" >
                                Home
                            </a>
                            
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="properties">
                                Properties
                            </a>
                            
                        </li>
                       
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pages
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="dashboard">Dashboard</a></li>
                                <li><a class="dropdown-item" href="about-us">About Us</a></li>
                                <li><a class="dropdown-item" href="affiliate-program">Affiliate Program</a></li>
                                
                                <li><a class="dropdown-item" href="how-it-works">How It Works</a></li>
                                <li><a class="dropdown-item" href="key-risks">Key Risks</a></li>
                                <li><a class="dropdown-item" href="loyality-program">Loyality Program</a></li>
                                <li><a class="dropdown-item" href="terms-conditions">Terms Conditions</a></li>
                                <li><a class="dropdown-item" href="privacy-policy">Privacy Policy</a></li>
                                <li><a class="dropdown-item" href="cookie-policy">Cookie Policy</a></li>
                                <li><a class="dropdown-item" href="support">Support</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact-us">Contact</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="support">Help Center</a>
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
    <!-- ==== #header end ====