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
    <section class="support__banner bg__img clear__top" data-background="./assets/images/support-bg.png">
        <div class="container">
            <div class="support__banner__area">
                <div class="support__banner__inner">
                    <h1 class="neutral-top">How can we help?</h1>
                    <div class="input input--secondary">
                        <input type="text" name="sear" id="sear_faq" placeholder="Search" />
                    </div>
                    <div class="faq__tab">
                        <a href="#start" class="faq__tab__btn faq__tab__btn__active">Getting Started</a>
                        <a href="#funds" class="faq__tab__btn">Adding Funds</a>
                        <a href="#investing" class="faq__tab__btn">Investing</a>
                        <a href="#security" class="faq__tab__btn">Security</a>
                        <a href="#taxes" class="faq__tab__btn">Taxes</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== faq section start ==== -->
     <section class="faq">
        <div class="container">
        <div class="faq__area">               
        <div class="faq__tab__content" id="start">
            <div class="faq__group">
                <div class="accordion" id="accordionExampleStart">
         <?php
                   
                   $select = mysqli_query($connect, "SELECT * FROM faqs");
                                                                        
                    
                    foreach($select AS $key){
                        
                        

?>
        
    
                            <div class="accordion-item content__space my-5">
                                <h5 class="accordion-header" id="headingStart<?=$key['id']; ?>">
                                    <span class="icon_box">
                                        <img src="assets/images/icons/message.png" alt="Start" />
                                    </span>
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseStart<?=$key['id']; ?>" aria-expanded="false"
                                        aria-controls="collapseStart<?=$key['id']; ?>">
                                        <?php echo $key['question']; ?>
                                    </button>
                                </h5>
                                <div id="collapseStart<?=$key['id']; ?>" class="accordion-collapse collapse"
                                    aria-labelledby="headingStart<?=$key['id']; ?>" data-bs-parent="#accordionExampleStart">
                                    <div class="accordion-body">
                                        
                                        <p><?php echo $key['answer']; ?></p>
                                    </div>
                                </div>
                            </div>



                        <?php } ?>
            </div>
        </div>
                                  
    </div>
</div>
</div>
</section>
    <!-- ==== #faq section end ==== -->

    <!-- ==== footer section start ==== -->
   <?php require 'inc/general_footer.php'; ?>
   <?php require 'inc/footlink.php'; ?>

</body>

</html>