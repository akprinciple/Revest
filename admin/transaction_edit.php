<?php
    require 'inc/session.php';
    if (isset($_POST['submit'])) {
      $amount = $_POST['amount'];
      $update = mysqli_query($connect, "UPDATE investments SET amount_invested = '$amount' WHERE md5(id) = '{$_GET['id']}'");
      if ($update) {
        header('location: transaction');
      }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Transacton  &dash; Real Estate Investment For Everyone</title>
	<?php require 'inc/toplink.php' ?>
</head>
<body>
					<?php require 'inc/header.php'; ?>
<div class="col-xxl-9">
<div class="main__content">
      <div class="collapse__sidebar">
          <h4>Edit Transaction</h4>
          <a href="javascript:void(0)" class="collapse__sidebar__btn">
              <i class="fa-solid fa-bars-staggered"></i>
          </a>
      </div>
     <div class="main__content-dashboard">
    <div class="breadcrumb-dashboard">
        <h5>Edit Transaction</h5>
        <div>
            <a href="transaction">All transactions</a>
            <i class="fa-solid fa-arrow-right-long"></i>
            <a href="javascript:void(0)">Edit</a>
        </div>
    </div>
    <?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $select = mysqli_query($connect, "SELECT * FROM investments WHERE md5(id) ='{$id}'");
        foreach ($select as $key) {
          # code...
        
    
     ?>
      <div class="row">
        
        <div class="col-md-6">
          <h4>Property Details</h4>
          <?php 
            $sql = mysqli_query($connect, "SELECT * FROM properties WHERE id ='{$key['property_id']}'");
            $row = mysqli_fetch_array($sql);

           ?>
           <div class="input input--secondary">
              <label for="">Property's Location</label>
              <input type="text" value="<?php echo $row['location']; ?>" readonly/>
            </div>
            <div class="input input--secondary">
              <label for="">Property's Address</label>
              <input type="text" value="<?php echo $row['address']; ?>" readonly/>
            </div>
             <div class="input input--secondary">
              <label for="">Property's Price</label>
              <input type="text" value="$<?php echo number_format($row['price']); ?>" readonly/>
            </div>
        </div>
        <div class="col-md-6">
          <h4>Investor's Details</h4>
          <?php 
             $query = mysqli_query($connect, "SELECT * FROM users WHERE id ='{$key['user_id']}'");
            $rw = mysqli_fetch_array($query);
           ?>
          <div class="input input--secondary">
              <label for="">Investor's Name</label>
              <input type="text" name="lastname" value="<?php echo $rw['firstname'].' '.$rw['lastname']; ?>" readonly/>
          </div>
          <div class="input input--secondary">
              <label for="">Transaction Id</label>
              <input type="text"  value="<?php echo $key['transaction_id']; ?>" required/>
          </div>
          <form method="post">
            <div class="input input--secondary">
              <label for="">Amount Invested($)</label>
              <input type="number" min="0" name="amount" value="<?php echo $key['amount_invested']; ?>" required/>
          </div>
          <button type="submit" name="submit" class="button button--effect mt-2 w-100">Update</button>

          </form>
        </div>
      </div>

     <?php }} ?>
  </div>
</div>
</div>
                        
                    
    <!-- ==== #dashboard section end ==== -->
	<?php require 'inc/footer.php' ?>
	<?php require 'inc/footlink.php' ?>



</body>
</html>