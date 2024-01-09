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

<!-- Cart Page Start -->
<div class="container py-5">
    <div class="container py-5">
        <div class="table-responsive mt-5">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Products Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
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
                            <p class="mb-0 mt-4"><?php echo $row['price'];?>K</p>
                        </td>
                        <td>
                            <p class="mb-0 mt-4"><?php echo $row['quantity'];?></p>

                        </td>
                        <td>
                            <p class="mb-0 mt-4"><?php
                                    $total = $row['price'] * $row['quantity'];
                                        echo $total;
                                        $total_amount += $total;
                                    ?>K</p>
                        </td>
                    </tr>
                    <?php }?>
                    <?php }?>
                </tbody>
            </table>
            <div class="col">
                <div class="col-12 text-end fs-4">
                    <p class="text-secondary">Total amount: <span>
                            <?php echo $total_amount;?>K
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

        <div class="row">
            <div class="col-6">
                <p><b>Name Reciver</b>: <?php echo $row['customer_name'];?></p>
                <p><b>Address Reciver</b>: <?php echo $row['address'];?></p>
                <p><b>Phone Reciver</b>: <?php echo $row['phone'];?></p>
            </div>
            <div class="col-6">
                <a class="btn btn-primary px-4 py-2" href="cart.php">Back To Cart <i class="fa fa-shopping-bag"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->

<?php include './includes/footer.php';?>