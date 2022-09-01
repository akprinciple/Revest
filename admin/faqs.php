<?php
    require 'inc/session.php';
    $msg = "";
    if (isset($_POST['submit'])) {
       $question = $_POST['question'];
       $answer = $_POST['answer'];
       $date = date('Y-m-d');
       
       
        $insert = mysqli_query($connect, "INSERT INTO faqs (question, answer, date) VALUES('$question', '$answer', '$date')");
        if ($insert) {
            $msg = "<div class='text-center'>Faq Successfully Added</div>";
        }
       }
    

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
   
    <!-- #title -->
    <title>FAQs &dash; Real Estate Investment For Everyone</title>
     <?php require 'inc/toplink.php' ?>

</head>

<body>

    <!-- ==== dashboard header start ==== -->

<?php require 'inc/header.php'; ?>
    
                    <div class="col-xxl-9">
                        <div class="main__content">
                            <div class="collapse__sidebar">
                                <h4>FAQs</h4>
                                <a href="javascript:void(0)" class="collapse__sidebar__btn">
                                    <i class="fa-solid fa-bars-staggered"></i>
                                </a>
                            </div>
                            <div class="main__content-dashboard">
                                <div class="breadcrumb-dashboard">
                                    <h5>FAQs</h5>
                                    <div>
                                        <a href="index">Home</a>
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                        <a href="javascript:void(0)">FAQs</a>
                                    </div>
                                </div>
                                <?php echo $msg; ?>
                    <div class="account-info p-0">
                            <div class="account-info__btn-wrapper p-3">
                                <a href="#general"
                                    class="account-info__btn account-info__btn-active button button--effect">FAQs</a>
                                <a href="#billing" class="account-info__btn button button--effect">Add</a>
                                <!-- <a href="#security" class="account-info__btn button button--effect">Gallery</a> -->
                                
                            </div>
                            <div class="account-content_wrapper">
                                <div class="account-content pb-4" id="general">
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

                                        
                                        <a href="delete?del_faq=<?php echo md5($key['id']); ?>" class="fa-solid fa-trash-alt text-danger mt-2"></a>
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
                                <div class="account-content p-3" id="billing">
                                <div class="col-md-9">
                                    <div class="withdraw-funds__inner">
                                        <h5>Add FAQ</h5>
                                        <p>Use the form below to add Frequently Asked Questions and Answers</p>
                                        <form method="post">
                                            <div class="regi__type">
                                                <label for="methodSelect">Question</label>
                                                <input list="users" type="text" name="question" class="form-control py-3 px-4" placeholder="Type the Question" required="required">
                                                  
                                                
                                            </div>
                                            <div class="input input--secondary mt-2">
                                                <label for="withdrawAmount">Answer</label>
                                                <textarea name="answer" id="withdrawAmount"
                                                    placeholder="Type the Answer" required="required"></textarea>
                                            </div>
                                            <button type="submit" name="submit" class="button button--effect">Add</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                        </div>
                    </div>
                                
                            </div>
                        </div>
                    </div>
               
                <?php require 'inc/footer.php' ?>
                <?php require 'inc/footlink.php' ?>
</body>

</html>