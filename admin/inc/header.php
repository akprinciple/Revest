	<!-- ==== dashboard header start ==== -->
    <header class="dashboard-header">
        <div class="container">
            <div class="dashboard-header__area">
                <a href="index" class="header-logo">
                    <img src="../assets/images/team/<?php 
                            $s= mysqli_query($connect, "SELECT image FROM users WHERE level = 1");
                            $r = mysqli_fetch_array($s);
                            echo $r['image'];
                        ?>" alt="Logo" class="logo" />
                </a>
                <div class="dashboard-header__area-content">
                    <a class="button button--effect" href="investment">
                        <img src="../assets/images/direction.png" alt="Investment" /> New Investments
                    </a>
                    
                    <div class="dashboard-language">
                        <select class="select-dashboard-language">
                            <option value="english">En</option>
                            <option value="australia">Aus</option>
                            <option value="germany">GER</option>
                            <option value="argentina">Arg</option>
                        </select>
                    </div>
                    <!-- <a href="account" class="profile">
                        <img src="../assets/images/profile.png" alt="Profile" />
                    </a> -->
                </div>
            </div>
        </div>
    </header>
    <!-- ==== #dashboard header end ==== -->

    <!-- ==== dashboard section start ==== -->
    <div class="dashboard section__space__bottom">
        <div class="container">
            <div class="dashboard__area">
                <div class="row">
                    <div class="col-xxl-3">
                        <div class="sidebar">
                            <a href="javascript:void(0)" class="close__sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                            <div class="sidenav__wrapper">
                                <ul>
                                    <li>
                                        <a href="index" class="sidenav__active">
                                            <img src="../assets/images/icons/dashboard.png" alt="Dashboard" /> Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="properties">
                                            <i class="fa-solid fa-suitcase"></i>
                                            Properties
                                        </a>
                                    </li>
                                    <li>
                                        <a href="investment">
                                            <img src="../assets/images/icons/investments.png" alt="Investments" />
                                            Investments
                                        </a>
                                    </li>
                                    <li>
                                        <a href="transaction">
                                            <img src="../assets/images/icons/transactions.png" alt="Transactions" />
                                            Transactions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="earnings">
                                            <i class="fa-solid fa-dollar-sign"></i>
                                            Earnings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="withdraw">
                                            <img src="../assets/images/icons/withdraw.png" alt="Withdraw" /> Withdraw
                                        </a>
                                    </li>
                                    <li>
                                        <a href="account">
                                            <img src="../assets/images/icons/account.png" alt="Account" /> Account
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages">
                                            <i class="fa-solid fa-cogs"></i>
                                            Pages
                                        </a>
                                    </li>
                                     <li>
                                        <a href="faqs">
                                            <i class="fa-solid fa-question"></i>
                                            FAQs
                                        </a>
                                    </li>
                                </ul>
                                <hr />
                                <ul class="logout">
                                    <li>
                                        <a href="../logout">
                                            <img src="../assets/images/icons/logout.png" alt="Logout" /> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="sidenav__wrapper sidenav__footer">
                                <h6>Last Login</h6>
                                <hr />
                                <div class="sidenav__time">
                                    <p class="secondary"><img src="../assets/images/icons/calendar.png" alt="Calendar" />
                                       <?=$ses_row['l_date']; ?></p>
                                    <p class="secondary"> <?=$ses_row['time']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>