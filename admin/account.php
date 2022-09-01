<?php
    include 'inc/session.php';
    $msg = "";
    if(isset($_POST['submit'])){
        $firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
        $phone = mysqli_real_escape_string($connect, $_POST['phone']);
        $sql = mysqli_query($connect, "UPDATE users SET phone = '{$phone}', lastname = '{$lastname}', firstname = '{$firstname}' WHERE id ='{$login_id}'");
        if($sql){
            $msg = "<div class='text-center'>Success!</div>";
            header('location: account');
        }
    }
    if (isset($_POST['upload'])) {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $no = rand(0000, 9999);
        $image_select = mysqli_query($connect, "SELECT image FROM users WHERE id = '{$login_id}'");
        $key = mysqli_fetch_array($image_select);
        $del_image = $key['image'];
        if($del_image !== " "){
        unlink('../assets/images/team/'.$del_image);
        }
        $image_update = mysqli_query($connect, "UPDATE users SET image = '{$no}{$image}' WHERE id = '{$login_id}'");
        move_uploaded_file($tmp, "../assets/images/team/$no$image");
        if ($image_update) {
            $msg = "<div class='mb-2 text-center'>Image successfully updated</div>";
            header('location: account');
                    
                }else{
                    $msg = "<div class='mb-2 text-danger text-center'>Error!</div>";
                }
    }
    if(isset($_POST['update_password'])){
        $current_pass = mysqli_real_escape_string($connect, $_POST['current_pass']);
        $new_pass = mysqli_real_escape_string($connect, $_POST['new_pass']);
        $con_new_pass = mysqli_real_escape_string($connect, $_POST['con_new_pass']);

        if ($current_pass !== $ses_row['password']) {
            $msg = "<div class='mb-2 text-danger text-center'>Wrong password!</div>";
        }elseif($new_pass !== $con_new_pass){
            $msg = "<div class='mb-2 text-danger text-center'>Password and Confirm password do not match!</div>";
        }else{
           $update = mysqli_query($connect, "UPDATE users SET password = '{$new_pass}' WHERE id = '{$login_id}'");
           if ($update) {
            $msg = "<div class='mb-2 text-center'>Password successfully updated</div>";
           } 
        }

    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Account  &dash; Real Estate Investment For Everyone</title>
	<?php require 'inc/toplink.php' ?>
</head>
<body>
					<?php require 'inc/header.php'; ?>
<div class="col-xxl-9">
<div class="main__content">
    <div class="collapse__sidebar">
        <h4>Account</h4>
        <a href="javascript:void(0)" class="collapse__sidebar__btn">
            <i class="fa-solid fa-bars-staggered"></i>
        </a>
    </div>
<div class="main__content-dashboard">
        <div class="breadcrumb-dashboard">
            <h5>Account</h5>
            <div>
                <a href="index">Dashboard</a>
                <i class="fa-solid fa-arrow-right-long"></i>
                <a href="javascript:void(0)">Account</a>
            </div>
        </div>
        <?php echo $msg; ?>
        <div class="account-info">
            <div class="account-info__btn-wrapper">
              <a href="#general"
                    class="account-info__btn account-info__btn-active button button--effect">
                Registered Users</a>
                <a href="#billing" class="account-info__btn button button--effect">
                Website Info</a>
                <a href="#security" class="account-info__btn button button--effect">Security</a>
            </div>
            <div class="account-content_wrapper w-100">
              <div class="account-content" id="general">
                 <div class="investment-table investment-table-two">
                  <div class="table-wrapper">
                <table>
                    <tr>
                      
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                       
                        <th>Registration Date</th>
                        <th>Action</th>
                    </tr>
                    <?php
                  $select = mysqli_query($connect, "SELECT * FROM users WHERE level !=1 ORDER BY id DESC ");
                          
                            $n = 1;
                            foreach($select AS $key){
                               

?>
                            <tr>
                               
                                <td><?php echo $key['firstname'] . " " .$key['lastname']; ?></td>
                                
                                <td style="font-size: 14px;"><?php echo $key['email']; ?></td>
                                <td><?php echo $key['phone']; ?></td>
                                
                                <td><?php echo $key['date']; ?></td>
                                <td>
                                <?php 
                                    if ($key['level']==2) {
                                      
                                    

                                 ?>
                                 <span style="font-size: 12px; color: red;">Not Verified</span> 
                             <?php }elseif ($key['level']==0){ ?>
                                    <span style="font-size: 12px">Verified</span>
                             <?php } ?>
                                 <a href="user_details.php?id=<?php echo md5($key['id']); ?>" class="fa-solid fa-pen text-primary"></a>
                                </td>
                            </tr>
                          <?php } ?>
                          </table>
                          </div>
                </div>
              </div>
                <div class="account-content" id="billing">
                    <div class="avatar-wrapper">
                        <div class="avatar-content">
                            <div class="avatar">
                            <?php
                            if(!empty($ses_row['image'])){
                            ?>
                                <img src="../assets/images/team/<?php echo $ses_row['image']; ?>" alt="<?php echo $ses_row['image']; ?>" />

                            <?php }else{ ?>
                                <img src="../assets/images/team/ryan.png" alt="Avatar" />
                            <?php } ?>
                            </div>
                            <div class="avatar-content__guideline">
                                <h6>Website Logo</h6>
                                <p>Website Logo size: 400px x 400px</p>
                            </div>
                        </div>
                        <form enctype="multipart/form-data" method="post">
                            <input type="file" name="image" id="avatarUpload" />
                            <label for="avatarUpload">
                                Upload new logo
                            </label>
                            <div class='mt-2 text-center'>
                            <button type="submit" name="upload" class="button button--effect">Save
                                Changes</button>
                                </div>
                        </form>
                    </div>
                    <form name="save__from" method="post" class="save__form">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="saveFirstName">Website Name</label>
                                    <input type="text" name="firstname"
                                        id="saveFirstName" value="<?php echo $ses_row['firstname']; ?>" placeholder="First Name"
                                        required="required" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="saveLastName">Admin Name</label>
                                    <input type="text" name="lastname" id="saveLastName"
                                        placeholder="Last Name" value="<?php echo $ses_row['lastname']; ?>" required="required" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="saveEmail">Admin Login Email</label>
                                    <input type="email" name="save_email" id="saveEmail"
                                        placeholder="Enter Your Email" disabled="disabled" value="<?php echo $ses_row['email']; ?>" required="required" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input input--secondary">
                                    <label for="savePhone">Phone</label>
                                    <input type="number" name="phone" id="savePhone"
                                        placeholder="345-323-1234" value="<?php echo $ses_row['phone']; ?>" required="required" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="submit" class="button button--effect">Save
                                Changes</button>
                        </div>
                    </form>
                    <div class="account-content-single">
                        <div class="intro">
                            <h5>Notifications </h5>
                        </div>
                        <div class="account-content-single__inner">
                            <div class="content">
                                <h6>Announcements</h6>
                                <p>Occasional announcements of new features</p>
                            </div>
                            <div class="content-right">
                                <div class="switch-wrapper">
                                    <input type="checkbox" id="announcement"
                                        checked="checked" /><label for="announcement"></label>
                                </div>
                            </div>
                        </div>
                        <div class="account-content-single__inner">
                            <div class="content">
                                <h6>Feedback requests</h6>
                                <p>Occasional requests for feedback</p>
                            </div>
                            <div class="content-right">
                                <div class="switch-wrapper">
                                    <input type="checkbox" id="feedback"
                                        checked="checked" /><label for="feedback"></label>
                                </div>
                            </div>
                        </div>
                        <div class="account-content-single__inner">
                            <div class="content">
                                <h6>Billing and account</h6>
                                <p>Transactional emails and account notifications</p>
                            </div>
                            <div class="content-right">
                                <p>Legally Obligated</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
              
                <div class="account-content" id="security">
                    <div class="two-factor-wrapper">
                        <div class="two-factor-content">
                            <h6>Two Factor Authentication</h6>
                            <p>Two-Factor Authentication (2FA) can be used to help protect your
                                account</p>
                        </div>
                        <a href="#" class="button button--effect">Enable</a>
                    </div>
                    <div class="change__pass">
                        <div class="row neutral-row">
                            <div class="col-md-6">
                                <div class="change__pass-content column__space">
                                    <h5>Change Password</h5>
                                    <p>You can always change your password for security reasons
                                        or reset your password in case you forgot it.</p>
                                    <a href="#" class="button button--effect">Forgot
                                        Password?</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form  name="change__pass" method="post">
                                    <div class="input input--secondary">
                                        <label for="currentPass">Current Password</label>
                                        <input type="password" name="current_pass"
                                            id="currentPass" placeholder="Current Password"
                                            required="required" />
                                    </div>
                                    <div class="input input--secondary">
                                        <label for="newPass">New Password</label>
                                        <input type="password" name="new_pass" id="newPass"
                                            placeholder="New Password" required="required" />
                                    </div>
                                    <div class="input input--secondary">
                                        <label for="conNewPass">Confirm New Password</label>
                                        <input type="password" name="con_new_pass"
                                            id="conNewPass" placeholder="Confirm Password"
                                            required="required" />
                                    </div>
                                    <div>
                                        <button type="submit" name="update_password"
                                            class="button button--effect">Update
                                            Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="account-content-single account-content-single__alt">
                        <div class="intro">
                            <h5>Additional Security</h5>
                            <a href="#">Add Method</a>
                        </div>
                        <div class="account-content-single__inner">
                            <div class="content">
                                <h6>SMS recovery</h6>
                                <p>Number ending with 1234</p>
                            </div>
                            <div class="content-right">
                                <a href="#" class="button button--effect">Disable SMS</a>
                            </div>
                        </div>
                        <div class="account-content-single__inner">
                            <div class="content">
                                <h6>Autheticator App</h6>
                                <p>Google Authenticator</p>
                            </div>
                            <div class="content-right">
                                <a href="#" class="button button--effect alt">Configure</a>
                            </div>
                        </div>
                        <div class="account-content-single__inner">
                            <div class="content">
                                <h6>SSL Certificate</h6>
                                <p>Secure Sockets Layer</p>
                            </div>
                            <div class="content-right">
                                <a href="#" class="button button--effect alt">Configure</a>
                            </div>
                        </div>
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