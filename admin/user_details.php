<?php
    require 'inc/session.php';
    $msg = "";
    if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $sql = mysqli_query($connect, "SELECT * FROM users WHERE md5(id) = '{$id}'");
        $key = mysqli_fetch_array($sql);
    }
    if (isset($_POST['submit'])) {
      $email = mysqli_real_escape_string($connect, $_POST['email']);
      $phone = mysqli_real_escape_string($connect, $_POST['phone']);
      $firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
      $lastname = mysqli_real_escape_string($connect, $_POST['lastname']);

      $update= mysqli_query($connect, "UPDATE users SET firstname='$firstname', lastname = '$lastname', email = '$email', phone = '$phone' WHERE md5(id) ='{$_GET['id']}'");
      if ($update) {
        header('location: user_details?id='.$id);
        $msg = "<div class='mb-2 text-center'>User's Info has been successfully updated</div>";
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>User's Details  &dash; Real Estate Investment For Everyone</title>
	<?php require 'inc/toplink.php' ?>
</head>
<body>
					<?php require 'inc/header.php'; ?>
                    <div class="col-xxl-9">
                        <div class="main__content">
                            <div class="collapse__sidebar">
                                <h4>User's Info</h4>
                                <a href="javascript:void(0)" class="collapse__sidebar__btn">
                                    <i class="fa-solid fa-bars-staggered"></i>
                                </a>
                            </div>
                           <div class="main__content-dashboard">
                                <div class="breadcrumb-dashboard">
                                    <h5>User's Account Information</h5>
                                    <div>
                                        <a href="account">account</a>
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                        <a href="javascript:void(0)">User's Details</a>
                                    </div>
                                </div>
                                 
                           </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <?php if (!empty($key['image'])) {
                                     
                                     ?>
                                    <img class="w-100" src="../assets/images/team/<?php echo $key['image']; ?>">
                                  <?php }else{ ?>

                                 <img src="../assets/images/profile.png" class="card-img" alt="Avatar" />
                                  <?php } ?>
                                <h6 class="mt-3">Total Withdrawable income | (
                                    $<?php
                                          $earnings_sel = mysqli_query($connect, "SELECT SUM(amount) AS total FROM earnings WHERE md5(user_id) = '{$id}'");
                                          $earnings_rw = mysqli_fetch_array($earnings_sel);
                                          $withdrawal_selt = mysqli_query($connect, "SELECT SUM(amount) AS total FROM withdrawal WHERE md5(user_id) = '{$id}' && status =1");
                                              $withdrawal_row = mysqli_fetch_array($withdrawal_selt);
                                              echo number_format($earnings_rw['total']- $withdrawal_row['total']);
                                         
                                        ?>
                                )</h6>

                            <div class="investment-table investment-table-two mt-3">
                                <div class="intro">
                                    <h5>Earnings</h5>
                                    <h6>Total <span>($<?php
                                          $e_sel = mysqli_query($connect, "SELECT SUM(amount) AS total FROM earnings WHERE md5(user_id) = '{$id}'");
                                          $e_rw = mysqli_fetch_array($e_sel);
                                          echo number_format($e_rw['total']);
                                        ?>)
                                    </span></h6>
                                </div>
                                <div class="table-wrapper">
                                    <table>
                                        <tr>
                                            <!-- <th>Project</th> -->
                                           
                                            <th>Amount </th>
                                           
                                            <!-- <th>Trans Id</th> -->
                                            <th>Date</th>
                                            
                                        </tr>
                                        <?php   
                                                $e_selt = mysqli_query($connect, "SELECT * FROM earnings WHERE md5(user_id) = '{$id}' ORDER BY id DESC LIMIT 30");
                                              
                                                $n = 1;
                                                foreach($e_selt AS $ky){
                                                    

                            ?>
                                                <tr>
                                                   
                                                    
                                                    <td>$<?php echo number_format($ky['amount']); ?></td>
                                                    
                                                    
                                                    <td><?php echo $ky['date']; ?></td>
                                                    
                                                </tr>

                                            <?php } ?>
                                    </table>
                                </div>
                            </div>
                                  </div>
                                  <div class="col-md-6">
                                    <?php echo $msg; ?>
                                    <h4 class="text-center text-capitalize"><?php echo $key['firstname']." ". $key['lastname']; ?></h4>
                                      <form method="post">
                                        <div class="input input--secondary">
                                      <label for="">Firstname</label>
                                      <input type="text" name="firstname" value="<?php echo $key['firstname']; ?>" required/>
                                    </div>
                                    <div class="input input--secondary">
                                      <label for="">Lastname</label>
                                      <input type="text" name="lastname" value="<?php echo $key['lastname']; ?>" required/>
                                    </div>
                                    <div class="input input--secondary">
                                      <label for="">Email</label>
                                      <input type="text" name="email" value="<?php echo $key['email']; ?>" required/>
                                    </div>
                                    <div class="input input--secondary">
                                      <label for="">Phone Number</label>
                                      <input type="number" name="phone" value="<?php echo $key['phone']; ?>" required/>
                                    </div>
                                    <div class="input input--secondary">
                                      <label for="">Registration Date</label>
                                      <input type="text" value="<?php echo $key['date']; ?>" readonly/>
                                    </div>
                                    <div class="input input--secondary">
                                      <label for="">Last Login</label>
                                      <input type="text" value="<?php echo $key['l_date']. " @ ". $key['time'] ?>" readonly/>
                                    </div>
                                     <button type="submit" name="submit" class="button button--effect mb-3">Search</button>
                                    </form>
                                  </div>
                                  <div class="col-md-7">
                                     <div class="investment-table investment-table-two">
                                    <div class="intro">
                                        <h5>Transactions</h5>
                                        <h6>Total Costs <span>($<?php
                                              $sel = mysqli_query($connect, "SELECT SUM(amount_invested) AS total FROM investments WHERE md5(user_id) = '{$id}' && status =1");
                                              $rw = mysqli_fetch_array($sel);
                                              echo number_format($rw['total']);
                                            ?>)
                                        </span></h6>
                                    </div>
                                    <div class="table-wrapper">
                                        <table>
                                            <tr>
                                                <th>Project</th>
                                               
                                                <th>Amount </th>
                                               
                                                <th>Trans Id</th>
                                                <th>Date</th>
                                                
                                            </tr>
                                            <?php   
                                                    $select = mysqli_query($connect, "SELECT * FROM investments WHERE md5(user_id) = '{$id}' && status = 1 ORDER BY id DESC LIMIT 30");
                                                  
                                                    $n = 1;
                                                    foreach($select AS $key){
                                                        $sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '{$key['user_id']}' LIMIT 1");
                                                        $row = mysqli_fetch_array($sql);
                                                        $project = mysqli_query($connect, "SELECT * FROM properties WHERE id = '{$key['property_id']}' LIMIT 1");
                                                        $pro = mysqli_fetch_array($project);

                    ?>
                                                    <tr>
                                                        <td>
                                                            <img src="../assets/images/property/<?php echo $pro['image']; ?>" alt="<?php echo $pro['image']; ?>" />
                                                           <?php echo $pro['address']; ?>
                                                        </td>
                                                        
                                                        <td>$<?php echo number_format($key['amount_invested']); ?></td>
                                                        
                                                        <td><?php echo $key['transaction_id']; ?></td>
                                                        <td><?php echo $key['day'].".".$key['month'].".".$key['year']; ?></td>
                                                        
                                                    </tr>
           
                                                <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                  </div>
                                  <div class="col-md-5">
                                     <div class="investment-table investment-table-two">
                                    <div class="intro">
                                        <h5>Withdrawals</h5>
                                        <h6>Total <span>($<?php
                                              $sel = mysqli_query($connect, "SELECT SUM(amount) AS total FROM withdrawal WHERE md5(user_id) = '{$id}' && status =1");
                                              $rw = mysqli_fetch_array($sel);
                                              echo number_format($rw['total']);
                                            ?>)
                                        </span></h6>
                                    </div>
                                    <div class="table-wrapper">
                                        <table>
                                            <tr>
                                                <!-- <th>Project</th> -->
                                               
                                                <th>Amount </th>
                                               
                                                <!-- <th>Trans Id</th> -->
                                                <th>Date</th>
                                                
                                            </tr>
                                            <?php   
                                                    $selt = mysqli_query($connect, "SELECT * FROM withdrawal WHERE md5(user_id) = '{$id}' && status = 1 ORDER BY id DESC LIMIT 30");
                                                  
                                                    $n = 1;
                                                    foreach($selt AS $key){
                                                        

                    ?>
                                                    <tr>
                                                       
                                                        
                                                        <td>$<?php echo number_format($key['amount']); ?></td>
                                                        
                                                        
                                                        <td><?php echo $key['date']; ?></td>
                                                        
                                                    </tr>
           
                                                <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                
                                  </div>
                                  <div class="col-md-12">
                                  <div class="investment-table investment-table-two">
                                    <div class="intro">
                                        <h5>Registration Questions & Answers</h5>
                                        
                                    </div>
                                    <div class="table-wrapper">
                                        <table>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Question</th>
                                                <th>Answer</th>
                                            </tr>
                                            <?php 
                                      $question = mysqli_query($connect, "SELECT * FROM answers WHERE md5(user_id) = '{$id}' LIMIT 1");
                                      foreach ($question as $ans) {
                                       
                                     
                                     ?>
                                      <tr>
                                        <td>1</td>
                                          <td>When it comes to real estate investing, how much previous experience do you?</td>        
                                          <td><?php echo $ans['q1']; ?></td>        
                                      </tr>
                                       <tr>
                                        <td>2</td>
                                          <td>My current Investment goals are:</td>        
                                          <td><?php echo $ans['q2']; ?></td>        
                                      </tr>
                                      <tr>
                                        <td>3</td>
                                          <td>Investments need time to develop. What is your investment horion?</td>        
                                          <td><?php echo $ans['q3']; ?></td>        
                                      </tr>
                                      <tr>
                                        <td>4</td>
                                          <td>How much are you looking to invest?</td>        
                                          <td><?php echo $ans['q4']; ?></td>        
                                      </tr>
           
                                                <?php } ?>
                                        </table>
                                    </div>
                                </div>  
                                   
                                  </div>
                                  <div class="col-sm-12 account-content">
                                  <hr>
                                    <div class="delete-account">
                                    <div class="delete-content">
                                        <h6>Delete User</h6>
                                        <p class="secondary">Before deleting this User, please note that
                                            if you delete him/her, It cannot be recovered.</p>
                                    </div>
                                    <a href="delete?del_user=<?php echo $_GET['id']; ?>" class="button button--effect">Delete</a>
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