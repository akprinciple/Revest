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

    
    <!-- ==== key faq section start ==== -->
    <section class="faq key-faq section__space">
        <div class="container">
            <div class="key-faq__area">
                <div class="section__header">
                    <h2 class="neutral-top">Key Risks</h2>
                  <?php  
                                $select = mysqli_query($connect, "SELECT * FROM pages WHERE `page name` = 'key-risks'");
                                foreach($select AS $key){
                                echo $key['content'];
                                }
                            ?>
                </div>
                <section class="faq">
        <div class="container">
        <div class="faq__area">               
        <div class="faq__tab__content" id="start">
            <div class="faq__group">
                <div class="accordion" id="accordionExampleStart">
         <?php
                   
                   $select = mysqli_query($connect, "SELECT * FROM faqs LIMIT 6");
                                                                        
                    
                    foreach($select AS $key){
                        
                        

?>
        
    
                            <div class="accordion-item content__space">
                                <h5 class="accordion-header" id="headingStart<?=$key['id']; ?>">
                                    <span class="icon_box">
                                        <img src="../assets/images/icons/message.png" alt="Start" />
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



            </div>
        </div>
    </section>
    <!-- ==== #key faq section end ==== -->


   <?php require 'inc/general_footer.php'; ?>
   <?php require 'inc/footlink.php'; ?>

</body>

</html>
