<?php 
    session_start();
    $cart = $_SESSION['cart'];

    if(empty($_SESSION['id'])){
        header("location: signin.php");
        exit;
    }
    
?>

<?php include './includes/navbar.php';?>

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
                        <th scope="col">Total</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach($cart as $id => $row){?>
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="../assets/temp/imgs/<?php echo $row['photos'];?>"
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
                            <div class="input-group quantity mt-4" style="width: 100px;">
                                <div class="input-group-btn">
                                    <a href="./handlers/update_quantity_cart.php?id=<?php echo $id?>&type=decrease"
                                        class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                </div>
                                <input type="text" class="form-control form-control-sm text-center border-0"
                                    value="<?php echo $row['quantity'];?>">
                                <div class="input-group-btn">
                                    <a href="./handlers/update_quantity_cart.php?id=<?php echo $id?>&type=increase"
                                        class="btn btn-sm btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>

                        </td>
                        <td>
                            <p class="mb-0 mt-4"><?php echo $row['price'] * $row['quantity'];?>K</p>
                        </td>
                        <td>
                            <a href="./handlers/remove_cart.php?id=<?php echo $id?>"
                                class="btn btn-md rounded-circle bg-light border mt-4">
                                <i class="fa fa-times text-danger"></i>
                            </a>
                        </td>
                    </tr>

                    <?php }?>
                </tbody>
            </table>
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
    </div>
</div>
<!-- Cart Page End -->

<?php include './includes/footer.php';?>