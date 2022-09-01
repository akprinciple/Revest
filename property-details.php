<?php
    require 'inc/dynamic_session.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    $msg = "";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
         $sql = mysqli_query($connect, "SELECT * FROM properties WHERE md5(id) = '{$id}' LIMIT 1");
         $key = mysqli_fetch_array($sql);
         $total = mysqli_query($connect, "SELECT SUM(amount_invested) AS amount FROM investments WHERE property_id = '{$key['id']}'  && status = 1");
         $sum = mysqli_fetch_array($total);
         $investors = mysqli_query($connect, "SELECT DISTINCT user_id FROM investments WHERE property_id = '{$key['id']}'  && status = 1");
 
         $count = mysqli_num_rows($investors);
        if(isset($_POST['submit']) && !isset($login_id)){
            header('location: login');
        }elseif(isset($_POST['submit']) && isset($login_id)){
            $amount = mysqli_real_escape_string($connect, $_POST['amount']);
            $property_id = $key['id'];
            $user_id = $login_id;
            $day = date('d');
            $month = date('m');
            $year = date('Y');
            $t_id = 'rvst'.rand(10000000, 99999999);
            $query = mysqli_query($connect, "INSERT INTO investments (property_id, amount_invested, user_id, day, month, year, transaction_id) VALUES ('$property_id', '$amount', '$user_id', '$day', '$month', '$year', '$t_id')");
            if($query){
                $msg = "<div class='bg-dark text-center text-light p-2' style='line-height:1;'> Thank you for Showing interest in our investment. You will contacted in a few moment for further discussions and payment</div>";

$firstname = $ses_row['firstname'];
$email = $ses_row['email'];
$addr = $key['address'];
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'vikhomes.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'admin@vikhomes.com';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('admin@vikhomes.com', 'Vikhomes');
    $mail->addAddress($email, $email);     //Add a recipient
    $mail->addAddress('admin@vikhomes.com');               //Name is optional
    // $mail->addReplyTo('akeemolayiwola09@gmail.com', 'Vikhomes');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Vikhomes';
    $mail->Body    = '<h4>Vikhomes</h4> Dear '. $firstname.' <br> Thank you for Showing interest in investing in our property. Our Customer care representatives will get back to you as soon as possible for further discussions and payment.
    <br>
    <b>Transactions Details are as follows:</b>
    <br>
     Address of Property:' . $addr.'
    <br> Proposed Amount: $'. $amount.'
    <br> Transaction Id: ' .$t_id.'
    <br> Date:' .$day.'/'.$month.'/'.$year.'
    <br>Thank You.';

    $mail->AltBody = '<h4>Vikhomes</h4> Dear '. $firstname.','.' <br> Thank you for Showing interest in investing in our property. Our Customer care representatives will get back to you as soon as possible for further discussions and payment.
    <br>
    <b>Transactions Details are as follows:</b>
    <br>
    Property Address:' . $key['address'].'
    <br> Proposed Amount:' . $amount.'
    <br> Transaction Id: ' .$t_id.'
    <br> Date:' .$day.'/'.$month.'/'.$year.'
    <br> Thank You!';

    $mail->send();
    

    // echo 'Message has been sent';
}
 catch (Exception $e) {
    $msg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}    

                // $add = "https://api.whatsapp.com/send/?phone=+2348145864549&text="."'Hi! I am {$ses_row['firstname']}%0a I will like to invest an amount of $amount USD in the property at {$key['address']}%0a Transaction Id is {$t_id}'";
                // '<script>setTimeout(function(){window.location='.'"'.$add.'"}'.', 3000)</script>';
            }else{
                $msg = "<div>Error!</div>";
            }
            
        }
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
<?php require 'inc/toplink.php'; ?>
   
    <!-- #title -->
   
    

</head>

<body>

    <!-- ==== header start ==== -->
    <?php require 'inc/general_header.php'; ?>

    <!-- ==== #header end ==== -->
    <?php
          echo $msg;
      ?>
    <!-- ==== details section start ==== -->
    <div class="property__details__banner bg__img clear__top"
        data-background="./assets/images/property/<?php echo $key['image']; ?>">
    </div>
    <section class="p__details faq section__space__bottom">
        <div class="container">
            <div class="p__details__area">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p__details__content">
                          
                            <a href="#gallery" class="button button--effect button--secondary"><i
                                    class="fa-solid fa-images"></i> Browse Gallery</a>
                            <div class="intro">
                                <h3><?php echo $key['location']; ?></h3>
                                <p><i class="fa-solid fa-location-dot"></i> <?php echo $key['address']; ?>
                                </p>
                            </div>
                            
                            <div class="group__one">
                                <h4>Project Description</h4>
                                <?php echo $key['description']; ?>
                            </div>
                           
                            <div class="terms">
                                <h5>Financial terms of the investment:</h5>
                                <div class="terms__wrapper">
                                    <div class="terms__single">
                                        <img src="assets/images/icons/loan.png" alt="Maximum Loan" />
                                        <p>Maximum loan term</p>
                                        <h5 class="neutral-bottom"><?php echo $key['term']; ?> Months</h5>
                                    </div>
                                    <div class="terms__single">
                                        <img src="assets/images/icons/charge.png" alt="Charge" />
                                        <p>Security</p>
                                        <h5 class="neutral-bottom">1st charge
                                            Mortgage</h5>
                                    </div>
                                    <div class="terms__single">
                                        <img src="assets/images/icons/project.png" alt="Annual" />
                                        <p>Annual Return</p>
                                        <h5 class="neutral-bottom"><?php echo $key['returns']; ?>%</h5>
                                    </div>
                                </div>
                            </div>
                     
                            
                            <div class="terms">
                                <h5>The capital growth distribution:</h5>
                                <div class="terms__wrapper">
                                    <div class="terms__single">
                                        <img src="assets/images/icons/investor.png" alt="Maximum Loan" />
                                        <p>Investors</p>
                                        <h5 class="neutral-bottom">40% - 60%</h5>
                                    </div>
                                    <div class="terms__single">
                                        <img src="assets/images/icons/project.png" alt="Charge" />
                                        <p>Project</p>
                                        <h5 class="neutral-bottom">40%</h5>
                                    </div>
                                    <div class="terms__single">
                                        <img src="assets/images/icons/revest.png" alt="Annual" />
                                        <p><?php echo $website; ?></p>
                                        <h5 class="neutral-bottom">Up to 20%</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="owner">
                                <img src="assets/images/owner.png" alt="Owner" />
                                <div>
                                    <h5>The project owner (borrower)</h5>
                                    <p><?php echo $key['owner']; ?></p>
                                </div>
                            </div>
                            <div class="faq__group">
                                <h5 class="atr">Frequently asked questions</h5>
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

                            <div class="group__one">
                                <h4>Key investment risks:</h4>
                                <p>Risk of falling prices: The price of the property might fall due to the increase in
                                    supply or decrease in demand in the area or other economic factors.Liquidity risk:
                                    The borrower might be unable to find a buyer in order to sell the property.Tenant
                                    risk: There is a risk that the asset can lose a tenant and it can take time to find
                                    replacements, which can have impact on the property's cash-flow.</p>
                                <div class="map__wrapper">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20342.411046372905!2d-74.16638039276373!3d40.719832743885284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1649562691355!5m2!1sen!2sbd"
                                        width="746" height="312" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5" id="invest">
                        <div class="p__details__sidebar">
                            <div class="intro">
                            <?php
                                echo $msg;
                            ?>
                                <div class="countdown__wrapper">
                                    <p class="secondary"><i class="fa-solid fa-clock"></i> Left to invest
                                    </p>
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
                                <h5>Available for funding: <span>$<?php echo number_format($key['price'] - $sum['amount']); ?></span></h5>
                                <div class="progress__type progress__type--two">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="project__info">
                                        <p class="project__has"><span class="project__has__investors"><?=$count ?>
                                                Investor(s)</span> | <span class="project__has__investors__amount"><i
                                                    class="fa-solid fa-dollar-sign"></i> <?php echo number_format($sum['amount']); ?></span></p>
                                        <p class="project__goal">
                                            <i class="fa-solid fa-dollar-sign"></i>  <?php echo number_format($key['price']); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="group brin">
                                <h5 class="neutral-top">Occupancy</h5>
                                <div class="acus__btns">
                                    <a href="javascript:void(0)" class="acus__btn acus__btn__active">0%</a>
                                    <a href="javascript:void(0)" class="acus__btn">20%</a>
                                    <a href="javascript:void(0)" class="acus__btn">40%</a>
                                    <a href="javascript:void(0)" class="acus__btn">60%</a>
                                    <a href="javascript:void(0)" class="acus__btn">80%</a>
                                    <a href="javascript:void(0)" class="acus__btn">100%</a>
                                </div>
                                <div class="acus__content">
                                    <form method="post">
                                        <div class="input input--secondary">
                                            <label for="anNumIn">Invest($)</label>
                                            <input type="number" onchange="cal(this.value)" onkeyup="cal(this.value)" name="amount" id="anNumIn" placeholder="$ 500"
                                                required="required" min="0" max="<?php echo $key['price'] - $sum['amount']; ?>" />
                                        </div>
                                        <div class="input input--secondary">
                                            <label for="anNum">Return rate (<?php echo $key['distribution'] ?>):</label>
                                            <input type="number" id="anNum" readonly placeholder="<?php echo $key['returns'] ?>%"
                                                 />
                                        </div>
                                        
                                        <div class="input input--secondary">
                                            <label for="txtHint">Earn ($)</label>
                                            <input type="number" name="an__num_in_two" id="txtHint"
                                                placeholder="$ 35.00" readonly />
                                        </div>
                                        <div class="capital">
                                            <p>Capital Growth Split:</p>
                                            <h5>40% <a href=""><i class="fa-solid fa-circle-info"></i></a>
                                            </h5>
                                        </div>
                                        <div class="item__security">
                                            <div class="icon__box">
                                                <img src="assets/images/home.png" alt="Security" />
                                            </div>
                                            <div class="item__security__content">
                                                <p class="secondary">Security</p>
                                                <h6>1st-Rank Mortgage</h6>
                                            </div>
                                        </div>
                                        <div class="suby">
                                            <h5></h5>
                                            <button type="submit" name="submit" class="button button--effect">Invest Now</button>
                                        </div>
                                    </form>
                                    <script type="text/javascript">
							function cal(str) {
								// body...
						if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
						} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
						}
						xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
						document.getElementById("txtHint").value = this.responseText;
						}
						};
						xmlhttp.open("GET","multiply.php?rate=<?php echo $key['returns']; ?>&q="+str,true);
						xmlhttp.send();
							}

						</script>
                                </div>
                                <p class="text-center neutral-bottom">
                                    <a href="contact-us">Request a free callback</a>
                                </p>
                            </div>
                           
                            <div class="group birinit">
                                <h6>Share via Social </h6>
                                <div class="social text-start">
                                    <a href="javascript:void(0)">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="javascript:void(0)">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="group alt__brin">
                                <h5>Key Updates <i class="fa-solid fa-bell"></i></h5>
                                <hr />
                                <div class="singl__wrapper">
                                    <div class="singl">
                                        <img src="assets/images/check.png" alt="Check" />
                                        <div>
                                            <p>30-Aug-2022</p>
                                            <a href="terms-conditions">Term Sheet Signed</a>
                                        </div>
                                    </div>
                                    <div class="singl">
                                        <img src="assets/images/check.png" alt="Check" />
                                        <div>
                                            <p>30-Aug-2022</p>
                                            <a href="privacy-policy">Listing Live</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="group alt__brin__last">
                                <h5>Reports</h5>
                                <hr />
                                <h6>Investment Note</h6>
                                <p>Property Share's Detailed Investment Note</p>
                                <?php
                            $file_query = mysqli_query($connect, "SELECT * FROM files WHERE md5(property_id) = '{$_GET['id']}'");
                            foreach($file_query AS $file_row){
                        ?>
                            
                            
                            <a href="./assets/files/<?php echo $file_row['name']; ?>" class="button mt-2" download="<?php echo $file_row['name']; ?>">DOWNLOAD INVESTMENT NOTE <i
                                        class="fa-solid fa-download"></i></a>
                            
                            
                            <?php } ?>
                                
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #details section end ==== -->

    <!-- ==== property gallery two section start ==== -->
    <section class="p__gallery wow fadeInUp" id="gallery">
        <div class="container">
            <hr class="divider" />
            <div class="p__gallery__area section__space">
                <div class="title__with__cta">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                            <h2>Property Gallery</h2>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-start text-lg-end">
                                <a href="contact-us" class="button button--secondary button--effect">Request
                                    info</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p__gallery__single">
                    <?php
                    $query = mysqli_query($connect, "SELECT * FROM gallery WHERE md5(property_id) = '{$id}' ORDER BY  rand() LIMIT 9");
                    foreach ($query as $row) {
                    ?>
                    <div class="col-md-6 col-lg-4 gallery__single__two">
                        <a href="assets/images/gallery/<?php echo $row['name']; ?>">
                            <img src="assets/images/gallery/<?php echo $row['name']; ?>" alt="Property Image" />
                        </a>
                    </div>
                    <?php
                        }
                    ?>
  </div>
                    <!-- Video area -->
    <?php            
     if(!empty($key['video'])){
    ?>
    <div class="video" style="top: 0; margin: 15px 0 0;">
        <div class="container">
            <div class="video__area">
                <img src="./assets/images/video-illustration.png" alt="Video Illustration" />
                <div class="video__btn">
                    <a class="video__popup" href="<?php echo $key['video']; ?>" target="_blank"
                        title="YouTube video player">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
              
            </div>
        </div>
    </section>
    <!-- ==== property gallery two section end ==== -->

    <!-- ==== all properties in grid section start ==== -->
    <section class="properties__grid section__space">
        <div class="container">
            <div class="properties__grid__area wow fadeInUp">
                <div class="title__with__cta">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-8">
                            <h2>Browse Similar Properties</h2>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-start text-lg-end">
                                <a href="properties" class="button button--secondary button--effect">Browse All
                                    Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="property__grid__wrapper">
                    <div class="row">
                        <?php
                    $sql_query = mysqli_query($connect, "SELECT * FROM properties WHERE status = 1 && type = '{$key['type']}' ORDER BY  rand() LIMIT 3");
                    foreach ($sql_query as $rw) {
                     $i_total = mysqli_query($connect, "SELECT SUM(amount_invested) AS amount FROM investments WHERE property_id = '{$rw['id']}'  && status = 1");
                    $i_sum = mysqli_fetch_array($i_total);
                    $i_investors = mysqli_query($connect, "SELECT DISTINCT user_id FROM investments WHERE property_id = '{$rw['id']}'");

                    $i_count = mysqli_num_rows($i_investors);
                     ?>
                        <div class="col-md-6 col-xl-4">
                            <div class="property__grid__single column__space--secondary">
                                <div class="img__effect" style="height: 250px; overflow-y: hidden;">
                                    <a href="property-details?id=<?php echo md5($rw['id']); ?>">
                                        <img src="assets/images/property/<?php echo $rw['image']; ?>" alt="<?php echo $rw['image']; ?>" />
                                    </a>
                                </div>
                                <div class="property__grid__single__inner">
                                    <h4><?php echo $rw['location']; ?></h4>
                                    <p class="sub__info"><i class="fa-solid fa-location-dot"></i> <?php echo $rw['address']; ?></p>
                                    <div class="progress__type">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="project__has"><span class="project__has__investors"><?php echo $i_count; ?>
                                                Investor(s)</span> |
                                            <span class="project__has__investors__amount"><i
                                                    class="fa-solid fa-dollar-sign"></i><?php echo number_format($i_sum['amount'],0 ); ?></span> <span
                                                class="project__has__investors__percent">(<?php echo number_format($i_sum['amount']*100/$rw['price'], 2)  ; ?>%)</span>
                                        </p>
                                    </div>
                                    <div class="item__info">
                                        <div class="item__info__single">
                                            <p>Annual Return</p>
                                            <h6><?php echo $rw['returns']; ?>% + 2%</h6>
                                        </div>
                                        <div class="item__info__single">
                                            <p>Property Type</p>
                                            <h6><?php echo $rw['type']; ?></h6>
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
                                            <a href="property-details?id=<?php echo md5($rw['id']); ?>#invest" class="button button--effect">
                                                Invest Now
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                                  
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #all properties in grid section end ==== -->
   
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
                            <h2>You Invest. <?php echo $website; ?>
                                Does the Rest</h2>
                            <p>Transparent Real Estate Investing Through <?php echo $website; ?>.Join us and
                                experience a smarter,better way to invest in real estate</p>
                            <a href="properties" class="button button--effect">Start Exploring</a>
                            <img src="assets/images/arrow.png" alt="Go to" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==== #market section end ==== -->

    <!-- ==== footer section start ==== -->
    <?php require 'inc/general_footer.php'; ?>

    <!-- ==== #footer section end ==== -->

    
    <?php require 'inc/footlink.php'; ?>

</body>

</html>