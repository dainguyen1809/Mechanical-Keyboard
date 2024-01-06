<?php include '../includes/navbar.php';?>

<?php
    require '../../config/connect.php';

    $sql = "select orders.*,
    customers.customer_name, customers.phone, customers.address
    from orders
    join customers
    on customers.id = orders.customer_id";
    $result = mysqli_query($conn, $sql);
?>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Management Orders</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Time Order</th>
                            <th>Receiver Infor</th>
                            <th>Shipper Infor</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Handler</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Time Order</th>
                            <th>Receiver Infor</th>
                            <th>Shipper Infor</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Handler</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($result as $row){?>
                        <?php if($row['status'] != 2){?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['create_at'];?></td>
                            <td>
                                <p>Name: <?php echo $row['name_receiver'];?></p>
                                <p>Address: <?php echo $row['address_receiver'];?></p>
                                <p>Phone number: <?php echo $row['phone_receiver'];?></p>

                            </td>
                            <td>
                                <p>Name: <?php echo $row['customer_name'];?></p>
                                <p>Address: <?php echo $row['address'];?></p>
                                <p>Phone number: <?php echo $row['phone'];?></p>

                            </td>
                            <td>
                                <?php switch($row['status']){
                                            case 0:
                                                echo 'Just Ordered';
                                                break;
                                            case 1:
                                                echo 'Confirmed';
                                                break;
                                            case 2:
                                                echo 'Canceled';
                                                break;
                                        
                                    }?>

                            </td>
                            <td><?php echo $row['total_amount']?>K</td>
                            <td class="text-center">
                                <?php if($row['status'] == 1){?>
                                <a class="btn btn-primary mt-5"
                                    href="order_details.php?id=<?php echo $row['id'];?>">View
                                    Details</a>
                                <?php } else if($row['status'] == 2) {?>

                                <?php } else {?>
                                <a class="btn btn-primary" href="order_details.php?id=<?php echo $row['id'];?>">View
                                    Details</a>
                                <hr>
                                <a class="btn btn-success"
                                    href="update.php?id=<?php echo $row['id'];?>&status=1">Comfirm</a>
                                <hr>
                                <a class="btn btn-danger"
                                    href="update.php?id=<?php echo $row['id'];?>&status=2">Cancel</a>
                                <?php }?>
                            </td>
                        </tr>
                        <?php }?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include '../includes/footer.php';?>