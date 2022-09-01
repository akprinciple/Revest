<?php
    require 'inc/session.php';
    $msg = "";
    if(isset($_POST['submit'])){
        $amount = mysqli_real_escape_string($connect, $_POST['amount']);
        $payment = mysqli_real_escape_string($connect, $_POST['payment']);
        $date = date('Y-m-d');
        $user_id = $login_id;
        if ($payment == 'method') {
            $msg = "<div class='text-center text-danger'>Please Select Payment Method</div>";
        }
        else{
         $insert = mysqli_query($connect, "INSERT INTO withdrawal (user_id, amount, payment_type, date) VALUES ('$user_id', '$amount', '$payment', '$date')");
         if ($insert) {
             $msg = "<div class='text-center'>Withdrawal Request successfully submmit. Our Representatives will get back to you as soon as possible</div>";
         }
     }
    }
?>
<!DOCTYPE html>
<html>
<head>
	
	<?php require 'inc/toplink.php' ?>
</head>
<body>
					<?php require 'inc/header.php'; ?>
                    <div class="col-xxl-9">
                        <div class="main__content mb-4">
                            <div class="collapse__sidebar">
                                <h4>Withdrawals</h4>
                                <a href="javascript:void(0)" class="collapse__sidebar__btn">
                                    <i class="fa-solid fa-bars-staggered"></i>
                                </a>
                            </div>
                           <div class="main__content-dashboard">
                                <div class="breadcrumb-dashboard">
                                    <h5>Withdrawals</h5>
                                    <div>
                                        <a href="index">Dashboard</a>
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                        <a href="javascript:void(0)">Withdrawal Requests</a>
                                    </div>
                                </div>
                                <?php echo $msg; ?>
                                <div class="account-info">
                                    <div class="account-info__btn-wrapper">
                                        <a href="#general"
                                            class="account-info__btn account-info__btn-active button button--effect">Withdrawal form</a>
                                        <a href="#billing" class="account-info__btn button button--effect">Requests</a>
                                        <!-- <a href="#security" class="account-info__btn button button--effect">Security</a> -->
                                    </div>
                                    <div class="account-content_wrapper">
                                        <div class="account-content" id="general">



                                 <div class="withdraw-funds">
                                    <div class="withdraw-funds__inner">
                                        <h5>Withdraw Funds</h5>
                                        <p>Use the form below to withdraw from wallet instantly</p>
                                        <form method="post">
                                            <div class="input input--secondary">
                                                <label for="withdrawAmount">Amount($)</label>
                                                <input type="number" name="amount" id="withdrawAmount"
                                                    placeholder="100" required="required" min="0" max="<?php 

                                              $sel = mysqli_query($connect, "SELECT SUM(amount) AS total FROM earnings WHERE user_id = '{$ses_row['id']}'");
                                              $rw = mysqli_fetch_array($sel);
                                               $sl = mysqli_query($connect, "SELECT SUM(amount) AS total FROM withdrawal WHERE user_id = '{$ses_row['id']}' && status = 1");
                                              $r = mysqli_fetch_array($sl);
                                              echo number_format($rw['total']-$r['total']);

                                            ?>" />
                                            </div>
                                            <div class="regi__type">
                                                <label for="methodSelect">Payment Method</label>
                                                <select class="type__select" id="methodSelect" name="payment">
                                                    <option value="method">Payment Method</option>
                                                    <option value="paypal">Paypal</option>
                                                    <option value="maestro">Maestro</option>
                                                    <option value="visa">Visa</option>
                                                    <option value="American express">American Express</option>
                                                </select>
                                            </div>
                                            <button type="submit" name="submit" class="button button--effect">Withdraw</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                                        <div class="account-content" id="billing">

                                
                                <div class="investment-table investment-table-two">
                                    <div class="intro">
                                        <h5>Requests </h5>
                                        <h6>Total Number of Withdrawal Request <span>(<?php
                                              $sel = mysqli_query($connect, "SELECT * FROM withdrawal WHERE user_id = '{$ses_row['id']}'");
                                              echo mysqli_num_rows($sel);
                                            ?>)
                                        </span></h6>
                                        <h6>Total Amount Withdrawn <span>($<?php
                                              $sel = mysqli_query($connect, "SELECT SUM(amount) AS total FROM withdrawal WHERE user_id = '{$ses_row['id']}' && status = 1");
                                             $rw = mysqli_fetch_array($sel);
                                             echo number_format($rw['total']);
                                            ?>)
                                        </span></h6>
                                    </div>
                                    <div class="table-wrapper">
                                        <table>
                                            <tr>
                                                <!-- <th>Project/</th> -->
                                                <th>Payment Type</th>
                                                <th>Amount </th>
                                               
                                                <!-- <th>Transaction Id</th> -->
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                            <?php   
                                                    $select = mysqli_query($connect, "SELECT * FROM withdrawal WHERE user_id = '{$ses_row['id']}' ORDER BY id DESC");
                                                  
                                                    $n = 1;
                                                    foreach($select AS $key){
                                                       
                                                        
                    ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $key['payment_type']; ?></td>
                                                        <td>$<?php echo number_format($key['amount']); ?></td>
                                                        
                                                        <td><?php echo $key['date']; ?></td>
                                                        <td>
                                                          <?php 
                                                            if ($key['status'] == 1) {
                                                             
                                                            
                                                           ?>
                                                           <span class="paid fa-solid fa-check"></span>Paid
                                                         <?php }else{ ?>
                                                          <span class="process"></span>Processing...</td>
                                                           

                                                         <?php } ?>
                                                       
                                                    </tr>
           
                                                <?php } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    
    <!-- ==== #dashboard section end ==== -->
	<?php require 'inc/footer.php' ?>
	<?php require 'inc/footlink.php' ?>



</body>
</html>