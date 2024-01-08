<?php require '../check_level.php';?>

<?php include '../includes/navbar.php';?>

<?php
    require '../../config/connect.php';

    $order_id = $_GET['id'];
    

    $sql = "select * from order_details
    join products
    on products.id = order_details.product_id
    where order_id = '$order_id'";
    $result = mysqli_query($conn, $sql);

    $total_amount = 0;
    
?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 text-center">Order Details</h1>
    <p class="mb-4"><a class="btn btn-primary" href="index.php"><i class="fa fa-arrow-left"></i> Back To
            Dashboard
        </a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Products</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
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
                        <?php foreach($result as $row){?>
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="../../assets/temp/imgs/<?php echo $row['photos'];?>"
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
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col">
            <div class="d-flex justify-content-end">
                <h4 class="text-primary">Total amount: <b>
                        <?php echo $total_amount;?>K
                    </b>
                </h4>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php';?>