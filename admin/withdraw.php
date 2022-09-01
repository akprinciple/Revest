<?php
    require 'inc/session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Withdraw  &dash; Real Estate Investment For Everyone</title>
	<?php require 'inc/toplink.php' ?>
</head>
<body>
					<?php require 'inc/header.php'; ?>
                    <div class="col-xxl-9">
                        <div class="main__content">
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
                                 <div class="property__filter__area">
                <div class="row d-flex align-items-center mb-2">
                    <div class="col-lg-12 col-xl-8 mx-auto">
                        <div class="property__search__wrapper">
                        
                            <form>
                                <div class="input">
                                    <input type="search" name="k" id="propertySearch" title="Search for Transactions by User's Email, transaction id or Name" 
                                        placeholder="Search for Withdrawal Requests by User's Email or name" required="required" value="<?php if(isset($_GET['k'])){echo $_GET['k'];} ?>" />
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <button type="submit" class="button button--effect">Search</button>
                            </form>
                        </div>
                    </div>
                     
                  </div>
                </div>
                                <div class="investment-table investment-table-two">
                                    <div class="intro">
                                        <h5>Requests </h5>
                                        <h6>Total Number of Withdrawal Request <span>(
                                            <?php
                                              $sel = mysqli_query($connect, "SELECT * FROM withdrawal");
                                              echo mysqli_num_rows($sel);
                                            ?>
                                        )</span></h6>
                                        <h6>Total Amount Withdrawn <span>($<?php
                                              $sel = mysqli_query($connect, "SELECT SUM(amount) AS total FROM withdrawal WHERE status = 1");
                                             $rw = mysqli_fetch_array($sel);
                                             echo number_format($rw['total']);
                                            ?>)
                                        </span></h6>
                                    </div>
                                    <div class="table-wrapper">
                                        <table>
                                            <tr>
                                                <!-- <th>Project/</th> -->
                                                <th>Investor's Name</th>
                                                <th>Amount </th>
                                               
                                                <!-- <th>Transaction Id</th> -->
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                            <?php   if (isset($_GET['k'])) {
                                              $k = $_GET['k'];
                                              $select = mysqli_query($connect, "SELECT * FROM withdrawal WHERE user_id = ANY (SELECT id FROM users WHERE email = '{$k}') || user_id = (SELECT id FROM users WHERE firstname LIKE '%%{$k}%%' || lastname LIKE '%%{$k}%%')  ORDER BY id DESC LIMIT 30");
                                            }else{
                                                    $select = mysqli_query($connect, "SELECT * FROM withdrawal ORDER BY id DESC LIMIT 30");
                                                  }
                                                    $n = 1;
                                                    foreach($select AS $key){
                                                        $sql = mysqli_query($connect, "SELECT * FROM users WHERE id = '{$key['user_id']}' LIMIT 1");
                                                        $row = mysqli_fetch_array($sql);
                                                        
                    ?>
                                                    <tr>
                                                        
                                                        <td><?php echo $row['firstname'] . " " .$row['lastname']; ?></td>
                                                        <td>$<?php echo number_format($key['amount']); ?></td>
                                                        
                                                        <td><?php echo $key['date']; ?></td>
                                                        <td>
                                                          <?php 
                                                            if ($key['status'] == 1) {
                                                             
                                                            
                                                           ?>
                                                           <button class="fa-solid fa-check btn btn-primary" onclick="appr<?php echo $key['id']; ?>()" id="txtHint<?php echo $key['id']; ?>" title="Approved"></button>
                                                         <?php }else{ ?>
                                                           <button class="fa-solid fa-times btn btn-danger text-capitalized" onclick="appr<?php echo $key['id']; ?>()" id="txtHint<?php echo $key['id']; ?>" title="Waiting..."></button>

                                                         <?php } ?>
                                                        </td>
                                                    </tr>
            <script type="text/javascript">
                function appr<?php echo $key['id']; ?>() {
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
              document.getElementById("txtHint<?php echo $key['id']; ?>").className=this.responseText.split('|')[0];
              document.getElementById("txtHint<?php echo $key['id'];; ?>").title = this.responseText.split('|')[1];
              }
              };
              xmlhttp.open("GET","approve_withdrawal?id=<?php echo $key['id']; ?>",true);
              xmlhttp.send();
                }
  
              </script>
                                                <?php } ?>
                                        </table>
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