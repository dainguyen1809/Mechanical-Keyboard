<?php include './includes/navbar.php';?>

<?php 
      if(empty($_SESSION['id'])){
        header("location: 404.php");
        exit;
    }
?>

<?php include './includes/header.php';?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <?php if(isset($_SESSION['success'])){ ?>
            <span class="text-success">
                <?php echo $_SESSION['success'];?>
            </span>
            <?php unset($_SESSION['success']);?>
            <?php }?>
            <h3>Account Page</h3>
            <h5>Hi&comma; <span><?php echo $_SESSION['customer_name'];?>&excl;</span></h5>
            <div class="row">
                <h3>
                    <p class="text-secondary">Information Account</p>
                </h3>
                <a href="#">Your Order</a>
                <a href="#">Change Password</a>
                <a href="./handlers/signout.php">SignOut</a>
            </div>
        </div>
        <div class="col-6">
            <h3>
                <p class="text-secondary">Information Account</p>
                <p>Customer Name: <span><?php echo $_SESSION['customer_name'];?></span></p>
            </h3>
        </div>
    </div>
</div>


<?php include './includes/footer.php';?>