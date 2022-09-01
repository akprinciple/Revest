<?php
    require 'inc/session.php';
    $msg = "";
    // To add to investors' earnings
    if (isset($_POST['submit'])) {
       $email = $_POST['email'];
       $amount = $_POST['amount'];
       $date = date('Y-m-d');
       $sql = mysqli_query($connect, "SELECT id FROM users WHERE email = '{$email}'");
       $row = mysqli_fetch_array($sql);
       $user = $row['id'];
       $query = mysqli_query($connect, "SELECT user_id FROM investments WHERE user_id = '{$user}' && status = 1");
       if (mysqli_num_rows($query) < 1 ) {
           $msg = "<div class='text-center text-danger'>Selected user is not an investor</div>";
       }else{
        $insert = mysqli_query($connect, "INSERT INTO earnings (user_id, amount, date) VALUES('$user', '$amount', '$date')");
        if ($insert) {
            $msg = "<div class='text-center'>Earnings Successfully Added</div>";
        }
       }
    }


    // To reduce Investors' earnings
    if (isset($_POST['reduce'])) {
       $email = $_POST['r_email'];
       $amount = $_POST['r_amount'];
       $date = date('Y-m-d');
       $sql = mysqli_query($connect, "SELECT id FROM users WHERE email = '{$email}'");
       $row = mysqli_fetch_array($sql);
       $user = $row['id'];
       $query = mysqli_query($connect, "SELECT user_id FROM investments WHERE user_id = '{$user}' && status = 1");
       if (mysqli_num_rows($query) < 1 ) {
           $msg = "<div class='text-center text-danger'>Selected user is not an investor</div>";
       }else{
        $insert = mysqli_query($connect, "INSERT INTO earnings (user_id, amount, date) VALUES('$user', '-$amount', '$date')");
        if ($insert) {
            $msg = "<div class='text-center'>Earnings Successfully Reduced</div>";
        }
       }
    }

?>
<!DOCTYPE html>
<html lang="en-US">

<head>
   
    <!-- #title -->
    <title>Earnings &dash; Real Estate Investment For Everyone</title>
     <?php require 'inc/toplink.php' ?>

</head>

<body>

    <!-- ==== dashboard header start ==== -->

<?php require 'inc/header.php'; ?>
    
                    <div class="col-xxl-9">
                        <div class="main__content">
                            <div class="collapse__sidebar">
                                <h4>Earnings</h4>
                                <a href="javascript:void(0)" class="collapse__sidebar__btn">
                                    <i class="fa-solid fa-bars-staggered"></i>
                                </a>
                            </div>
                            <div class="main__content-dashboard">
                                <div class="breadcrumb-dashboard">
                                    <h5>Earnings</h5>
                                    <div>
                                        <a href="index">Home</a>
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                        <a href="javascript:void(0)">Earnings</a>
                                    </div>
                                </div>
                                <?php echo $msg; ?>
                    <div class="account-info">
                            <div class="account-info__btn-wrapper">
                                <a href="#general"
                                    class="account-info__btn account-info__btn-active button button--effect">All Earnings</a>
                                <a href="#billing" class="account-info__btn button button--effect">Add</a>
                                <a href="#security" class="account-info__btn button button--effect">Reduce</a>
                                
                            </div>
                            <div class="account-content_wrapper">
                                <div class="account-content" id="general">
                                <div class="property__filter__area">
                <div class="row d-flex align-items-center mb-2">
                    <div class="col-lg-12 col-xl-9 mx-auto">
                        <div class="property__search__wrapper">
                        
                            <form>
                                <div class="input">
                                    <input type="month" name="k" id="propertySearch" title="Search for Earning by Month of the year" 
                                        placeholder="Search for Transactions by Month of the year" required="required" value="<?php if(isset($_GET['k'])){echo $_GET['k'];} ?>" />
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <button type="submit" class="button button--effect">Search</button>
                            </form>
                        </div>
                    </div>
                     
                    
                    
                </div>
                  </div>
                                    <div class="investment-table">
        <div class="intro">
            <h5>All Earnings</h5>
            <?php 
                if (isset($_GET['k'])) {
                   $sel = mysqli_query($connect, "SELECT SUM(amount) AS total FROM earnings WHERE date LIKE '%%{$_GET['k']}%%'");
                        $rw = mysqli_fetch_array($sel); 
                   
             ?>
             <h6>
                 $<?php echo number_format($rw['total']); ?> | Month <?php echo $_GET['k']; ?>
             </h6>
             <?php  } ?>
            <h6>
                $<?php 
                   $c = mysqli_query($connect, "SELECT SUM(amount) AS total FROM earnings");
                    $r = mysqli_fetch_array($c);
                    echo number_format($r['total']);

                 ?> | All time
            </h6>
            
        </div>
            <div class="table-wrapper">
                <table>
                    <tr>
                        <th>Investor's Name</th>
                        <th>Email</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    if (isset($_GET['k'])) {
                   $select = mysqli_query($connect, "SELECT * FROM earnings WHERE date LIKE '%%{$_GET['k']}%%' ORDER BY id DESC LIMIT 30");
                        # code...
                    }else{
                   $select = mysqli_query($connect, "SELECT * FROM earnings ORDER BY id DESC LIMIT 30");
                        }                                                  
                    $n = 1;
                    foreach($select AS $key){
                        $sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '{$key['user_id']}' LIMIT 1");
                        $row = mysqli_fetch_array($sql);
                        

?>
                    <tr>
                        
                        <td class="text-capitalize"><?php echo $row['firstname'] . " " .$row['lastname']; ?></td>
                        <td style="font-size: 13px;"><?php echo $row['email']; ?></td>
                        <td style="color: <?php if ($key['amount'] < 0) {
                            echo 'red';
                        }?>"><?php echo number_format($key['amount']); ?>USD</td>
                        
                        <td><?php echo $key['date']; ?></td>
                        <td><a href="delete?del_earning=<?=md5($key['id']); ?>"  class="fa-solid fa-trash-alt text-danger" title="Delete Earning permanently"></a></td>
                        
                    </tr>
                        <?php } ?>
                        
                </table>
            </div>
        </div>
                                  
                            </div>
                                <div class="account-content" id="security">
                                <div class="col-md-9">
                                    <div class="withdraw-funds__inner">
                                        <h5>Reduce Investor Earnings</h5>
                                        <p>Use the form below to reduce Earnings in Investor's wallet instantly</p>
                                        <form method="post">
                                            <div class="regi__type">
                                                <label for="methodSelect">User's Email</label>
                                                <input list="users" type="email" name="r_email" class="form-control py-3 px-4">
                                                  <datalist id="users">
                                                    <?php 
                                                        $select = mysqli_query($connect, "SELECT email FROM users WHERE id = ANY (SELECT DISTINCT user_id FROM investments WHERE status = 1) ORDER BY id DESC");
                                                        foreach($select AS $key){
                                                     ?>
                                                    <option value="<?php echo $key['email']; ?>">
                                                    <?php } ?>
                                                   
                                                  </datalist>
                                                
                                            </div>
                                            <div class="input input--secondary">
                                                <label for="withdrawAmount">Amount in USD</label>
                                                <input type="number" name="r_amount" id="withdrawAmount"
                                                    placeholder="$100" required="required" />
                                            </div>
                                            <button type="submit" name="reduce" class="button button--effect">Reduce</button>
                                        </form>
                                    </div>

                                </div>
                                </div>
                                <div class="account-content" id="billing">
                                <div class="col-md-9">
                                    <div class="withdraw-funds__inner">
                                        <h5>Add Investor Earnings</h5>
                                        <p>Use the form below to add Earnings to Investor's wallet instantly</p>
                                        <form method="post">
                                            <div class="regi__type">
                                                <label for="methodSelect">User's Email</label>
                                                <input list="users" type="email" name="email" class="form-control py-3 px-4">
                                                  <datalist id="users">
                                                    <?php 
                                                        $select = mysqli_query($connect, "SELECT email FROM users WHERE id = ANY (SELECT DISTINCT user_id FROM investments WHERE status = 1) ORDER BY id DESC");
                                                        foreach($select AS $key){
                                                     ?>
                                                    <option value="<?php echo $key['email']; ?>">
                                                    <?php } ?>
                                                   
                                                  </datalist>
                                                
                                            </div>
                                            <div class="input input--secondary">
                                                <label for="withdraw">Amount in USD</label>
                                                <input type="number" name="amount" id="withdraw"
                                                    placeholder="$100" required="required" />
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