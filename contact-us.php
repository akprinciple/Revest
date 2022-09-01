<?php require 'inc/dynamic_session.php'; ?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <?php require 'inc/toplink.php'; ?>

</head>

<body>

    <?php require 'inc/general_header.php'; ?>

    <!-- ==== banner section start ==== -->
    <section class="support__banner contact__banner bg__img clear__top"
        data-background="./assets/images/contact-banner-bg.png">
        <div class="container">
            <div class="support__banner__area">
                <div class="support__banner__inner">
                    <h1 class="neutral-top">How can we help?</h1>
                    <h5 class="neutral-top">Got a question?</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #banner section end ==== -->

    <!-- ==== contact overview section start ==== -->
    <section class="contact__overview">
        <div class="container">
            <div class="contact__overview__area">
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="contact__overview__single column__space--secondary shadow__effect">
                            <img src="assets/images/icons/email.png" alt="email" />
                            <h5>Send Us an Email</h5>
                            <!-- <p>Lorem ipsum dolor sit amet consectetur adipiscing.</p> -->
                            <hr />
                            <p class="neutral-bottom">
                                <a href="mailto:<?php  
                                $select = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = 'mail'");
                                foreach($select AS $key){
                                echo $key['content'];
                                }
                            ?>">
                            <?php  
                                $select = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = 'mail'");
                                foreach($select AS $key){
                                echo $key['content'];
                                }
                            ?>
                                    
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="contact__overview__single column__space--secondary shadow__effect">
                            <img src="assets/images/icons/phone.png" alt="Call" />
                            <h5>Give Us a Call</h5>
                            <!-- <p>Lorem ipsum dolor sit amet consectetur adipiscing.</p> -->
                            <hr />
                            <p class="neutral-bottom">
                                <a href="tel:<?php  
                                $select = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = 'mobile_number'");
                                foreach($select AS $key){
                                echo $key['content'];
                                }
                            ?>"><?php  
                                $select = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = 'mobile_number'");
                                foreach($select AS $key){
                                echo $key['content'];
                                }
                            ?></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="contact__overview__single shadow__effect">
                            <img src="assets/images/icons/chat.png" alt="Chat" />
                            <h5>Chat with us</h5>
                            <!-- <p>Lorem ipsum dolor sit amet consectetur adipiscing.</p> -->
                            <hr />
                            <p class="neutral-bottom">
                                <a href="https://wa.me/<?php  
                                $select = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = 'mobile_number'");
                                foreach($select AS $key){
                                echo $key['content'];
                                }
                            ?>">Open live chat</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #contact overview section end ==== -->

    <!-- ==== ask section start ==== -->
    <section class="ask section__space bg__img" data-background="./assets/images/ask-bg.png">
        <div class="container">
            <div class="ask__area">
                <div class="alert__newsletter__area">
                    <div class="section__header">
                        <h2 class="neutral-top">Ask a Question</h2>
                    </div>
                    <form action="#" name="ask__from" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="askFirstName">First Name*</label>
                                    <input type="text" name="ask__first__name" id="askFirstName"
                                        placeholder="Enter Your First Name" required="required" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="askLastName">Last Name*</label>
                                    <input type="text" name="ask__last__name" id="askLastName"
                                        placeholder="Enter Your Last Name" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="input input--secondary">
                            <label for="askRegistrationMail">Email*</label>
                            <input type="email" name="ask__registration__email" id="askRegistrationMail"
                                placeholder="Enter your email" required="required" />
                        </div>
                        <div class="input input--secondary input__alt">
                            <label for="askNumber">Phone*</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <select class="number__code__select" id="numberCodeSelectAlert">
                                        <option selected value="0">+1</option>
                                        <option value="1">+2</option>
                                        <option value="2">+3</option>
                                        <option value="3">+4</option>
                                        <option value="4">+5</option>
                                        <option value="5">+6</option>
                                    </select>
                                </div>
                                <input type="number" name="ask__number" id="askNumber" required="required"
                                    placeholder="345-323-1234" />
                            </div>
                        </div>
                        <div class="input input--secondary">
                            <label for="askSubject">Subject*</label>
                            <input type="text" name="ask__subject" id="askSubject" placeholder="Write Subject"
                                required="required" />
                        </div>
                        <div class="input input--secondary">
                            <label for="askMessage">Message*</label>
                            <textarea name="ask_message" id="askMessage" required="required"
                                placeholder="Write Message"></textarea>
                        </div>
                        <div class="input__button">
                            <button type="submit" class="button button--effect">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #ask section end ==== -->

    <!-- ==== faq section start ==== -->
    <section class="faq section__space">
        <div class="container">
            <div class="faq__area">
                <div class="section__header">
                    <h2 class="neutral-top">Frequently Asked Questions</h2>
                </div>
                <div class="faq__group">
                    <div class="accordion" id="accordionExampleStart">
         <?php
                   
                   $set = mysqli_query($connect, "SELECT * FROM faqs");
                                                                        
                    
                    foreach($set AS $k){
                        
                        

?>
            <div class="accordion-item content__space my-5">
                <h5 class="accordion-header" id="headingStart<?=$key['id']; ?>">
                    <span class="icon_box">
                        <img src="assets/images/icons/message.png" alt="Start" />
                    </span>
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseStart<?=$k['id']; ?>" aria-expanded="false"
                        aria-controls="collapseStart<?=$k['id']; ?>">
                        <?php echo $k['question']; ?>
                    </button>
                </h5>
                <div id="collapseStart<?=$k['id']; ?>" class="accordion-collapse collapse"
                    aria-labelledby="headingStart<?=$k['id']; ?>" data-bs-parent="#accordionExampleStart">
                    <div class="accordion-body">
                        
                        <p><?php echo $k['answer']; ?></p>
                    </div>
                </div>
            </div>



        <?php } ?>
</div>
</div>
        
    
            </div>
        </div>
    </section>
    <!-- ==== #faq section end ==== -->

   <?php require 'inc/general_footer.php'; ?>
   <?php require 'inc/footlink.php'; ?>
</body>

</html>