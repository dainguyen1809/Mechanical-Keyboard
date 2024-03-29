<?php include './includes/navbar.php';?>

<?php 
    $cart = $_SESSION['cart'];
    if(empty($_SESSION['id'])){
        header("location: signin.php?error=Signin to view your cart");
        unset($cart);
        exit;
    }

    $total_amount = 0;
    
?>

<?php include './includes/searchbar.php';?>

<?php include './includes/header.php';?>

<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Products Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($_SESSION['cart'])){?>
                    <?php foreach($cart as $id => $row){?>
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="./assets/temp/imgs/<?php echo $row['photos'];?>"
                                    class="img-fluid me-5 rounded" style="width: 150px; height: 150px;" alt="">
                            </div>
                        </th>
                        <td>
                            <p class="mb-0 mt-4"><?php echo $row['product_name'];?></p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4 price-items"><span><?php echo $row['price'];?>K</span></p>
                        </td>
                        <td>
                            <div class="d-flex input-group mt-4" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button
                                        class="btn-update-quantity btn btn-sm btn-plus rounded-circle bg-light border"
                                        data-id='<?php echo $id?>' data-type='decrease'>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <p class="form-control form-control-sm text-center border-0">
                                    <span class="quantity"><?php echo $row['quantity'];?></span>
                                </p>
                                <div class="input-group-btn">
                                    <button
                                        class="btn-update-quantity btn btn-sm btn-plus rounded-circle bg-light border"
                                        data-id='<?php echo $id?>' data-type='increase'>
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="mb-0 mt-4">
                                <span class="total">
                                    <?php
                                    $total = $row['price'] * $row['quantity'];
                                        echo $total;
                                        $total_amount += $total;
                                    ?>
                                </span>
                            </p>
                        </td>
                        <td>
                            <button class="btn-remove btn btn-danger mb-0 mt-4" data-id='<?php echo $id?>'>
                                <i class="fa fa-times"></i>
                            </button>
                        </td>
                    </tr>
                    <?php }?>
                    <?php }?>
                </tbody>
            </table>
            <div class="col">
                <div class="col-12 text-end fs-4">
                    <p class="text-secondary">Total amount:
                        <span id="total_amount">
                            <?php echo $total_amount;?>
                        </span>
                    </p>
                </div>
            </div>
            <?php if(empty($cart)){?>
            <div class="row p-2">
                <h1 class="text-center">Shopping cart is empty!</h1>
                <div class=" text-center">
                    <a class="btn btn-primary text-light fs-5 mb-4" href="shop.php">Go to shopping <i
                            class="fa fa-shopping-bag"></i></a>
                </div>
            </div>
            <?php }?>
        </div>

        <?php
            $id = $_SESSION['id'];
            
            require './config/connect.php';

            $sql = "select * from customers where id = '$id'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);

        ?>

        <form method="post" action="./handlers/process_checkout.php">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="form-item">
                        <label class="form-label my-3">Name Reciver<sup>*</sup></label>
                        <input type="text" class="form-control" name="name_receiver"
                            value="<?php echo $row['customer_name'];?>">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Address Reciver<sup>*</sup></label>
                        <input type="text" class="form-control" placeholder="House Number Street Name"
                            name="address_receiver" value="<?php echo $row['address'];?>">
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Phone Number<sup>*</sup></label>
                        <input type="text" class="form-control" name="phone_receiver"
                            value="<?php echo $row['phone'];?>">
                    </div>
                    <div class="form-item mt-5">
                        <button class="btn border-secondary py-3 px-4 text-uppercase w-25 text-primary">Place
                            Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Cart Page End -->


<?php include './includes/footer.php';?>