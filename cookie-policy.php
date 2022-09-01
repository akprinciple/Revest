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
        data-background="./assets/images/banner/banner-bg.png">
        <div class="container">
            <div class="banner__area">
                <h1 class="neutral-top">Cookie Policy</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Pages
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                           Cookie Policy
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <img src="assets/images/banner/key-illustration.png" alt="Career" class="banner__thumb" />
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== privacy policy section start ==== -->
    <section class="terms section__space">
        <div class="container">
            <div class="terms-area">
                               
                 <?php  
                                $select = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = 'cookie-policy'");
                                foreach($select AS $key){
                                echo $key['content'];
                                }
                            ?>
            </div>
        </div>
    </section>
    <!-- ==== #privacy policy section end ==== -->

   <?php require 'inc/general_footer.php'; ?>
   <?php require 'inc/footlink.php'; ?>

</body>

</html>