<?php
    require 'inc/session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Transactons  &dash; Real Estate Investment For Everyone</title>
	<?php require 'inc/toplink.php' ?>
</head>
<body>
					<?php require 'inc/header.php'; ?>
                    <div class="col-xxl-9">
                        <div class="main__content">
                            <div class="collapse__sidebar">
                                <h4>Transactions</h4>
                                <a href="javascript:void(0)" class="collapse__sidebar__btn">
                                    <i class="fa-solid fa-bars-staggered"></i>
                                </a>
                            </div>
                           <div class="main__content-dashboard">
                                <div class="breadcrumb-dashboard">
                                    <h5>Transactions</h5>
                                    <div>
                                        <a href="index">Dashboard</a>
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                        <a href="javascript:void(0)">Transactions</a>
                                    </div>
                                </div>
                                 <div class="property__filter__area">
                <div class="row d-flex align-items-center mb-2">
                    <div class="col-lg-12 col-xl-6 mx-auto">
                        <div class="property__search__wrapper">
                        
                            <form>
                                <div class="input">
                                    <input type="search" name="k" id="propertySearch" title="Search for Transactions by User's Email, transaction id or Name" 
                                        placeholder="Search for Transactions by User's Email, transaction id or name" required="required" value="<?php if(isset($_GET['k'])){echo $_GET['k'];} ?>" />
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <button type="submit" class="button button--effect">Search</button>
                            </form>
                        </div>
                    </div>
                     <div class="col-lg-6 col-xl-3">
                        <div class="property__select__wrapper">
                        <form class="border-0" id="form1">
                            
                            <select class="location__select" name="property_location">
                                <?php if(isset($_GET['property_location'])) {

                                echo "<option value='{$_GET['property_location']}'>{$_GET['property_location']}</option>";
                                }else{
                                echo "<option data-display='Location'>Select Location</option>";

                                } ?>
                               <option value="Los Angeles">Los Angeles</option>
                                <option value="San Francisco, CA">San Francisco, CA</option>
                                <option value="The Weldon">The Weldon</option>
                                <option value="San Diego">San Diego</option>
                            </select>
                        </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-3">
                        <div class="property__select__wrapper">
                            
                            <select class="property__select" form="form1" name="property_type">
                                <?php if(isset($_GET['property_type'])) {

                                echo "<option value='{$_GET['property_type']}'>{$_GET['property_type']}</option>";
                                }else{
                                echo "<option data-display='Property'>Property Type</option>";

                                } ?>
                                <option value="commercial">Commercial</option>
                                <option value="residential">Residential</option>
                            </select>
                        </div><br>
                    </div>
                    <div class="col-md-10"></div>
                    <button type="submit" form="form1" class="button button--effect mt-2 col-md-2">Search</button>
                    
                    
                </div>
                  </div>
                </div>
                                <div class="investment-table investment-table-two">
                                    <div class="intro">
                                        <h5>Transactions</h5>
                                        <h6>Total Number of Transactions <span>(
                                            <?php
                                              $sel = mysqli_query($connect, "SELECT * FROM investments");
                                              echo mysqli_num_rows($sel);
                                            ?>
                                        )</span></h6>
                                    </div>
                                    <div class="table-wrapper">
                                        <table>
                                            <tr>
                                                <th>Project</th>
                                                <th>Investor</th>
                                                <th>Amount Invested</th>
                                               
                                                <th>Transaction Id</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                            <?php   if (isset($_GET['k'])) {
                                              $k = $_GET['k'];
                                              $select = mysqli_query($connect, "SELECT * FROM investments WHERE user_id = ANY (SELECT id FROM users WHERE email = '{$k}') || user_id = (SELECT id FROM users WHERE firstname LIKE '%%{$k}%%' || lastname LIKE '%%{$k}%%') || transaction_id = '{$k}' ORDER BY id DESC LIMIT 30");
                                            }elseif(isset($_GET['property_type']) && isset($_GET['property_location'])){
                                                  $select = mysqli_query($connect, "SELECT * FROM investments WHERE property_id = ANY (SELECT id FROM properties WHERE location = '{$_GET['property_location']}' && type = '{$_GET['property_type']}') ORDER BY id DESC LIMIT 30");
                                            }else{
                                                    $select = mysqli_query($connect, "SELECT * FROM investments ORDER BY id DESC LIMIT 30");
                                                  }
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
                                                        <td><?php echo $row['firstname'] . " " .$row['lastname']; ?></td>
                                                        <td>$<?php echo number_format($key['amount_invested']); ?></td>
                                                        
                                                        <td><?php echo $key['transaction_id']; ?></td>
                                                        <td><?php echo $key['day'].".".$key['month'].".".$key['year']; ?></td>
                                                        <td>
                                                          <?php 
                                                            if ($key['status'] == 1) {
                                                             
                                                            
                                                           ?>
                                                           <button class="fa-solid fa-check btn btn-primary" onclick="appr<?php echo $key['id']; ?>()" id="txtHint<?php echo $key['id']; ?>" title="Approved"></button>
                                                         <?php }else{ ?>
                                                           <button class="fa-solid fa-times btn btn-danger text-capitalized" onclick="appr<?php echo $key['id']; ?>()" id="txtHint<?php echo $key['id']; ?>" title="Waiting..."></button>

                                                         <?php } ?> &nbsp;
                                                         <a href="transaction_edit?id=<?php echo md5($key['id']); ?>" class="text-secondary fa-solid fa-pen" title="Edit Transaction"></a>
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
              xmlhttp.open("GET","transaction_details?id=<?php echo $key['id']; ?>",true);
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