<?php include '../includes/navbar.php';?>

<?php 
    require '../../config/connect.php';
    $sql = "select products.*,
    manufacturers.manufacturers_name as manufacturer_name
    from products
    join manufacturers on manufacturers.id = products.manufacturer_id";
    $result = mysqli_query($conn, $sql);
    
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Management Products</h1>
    <p class="mb-4"><a class="btn btn-primary" href="form_insert.php">Add
            Product <i class="fas fa-plus"></i></a></p>

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
                            <th>Product Name</th>
                            <th>Photo</th>
                            <th>Price</th>
                            <th>Manufacturer</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Product Name</th>
                            <th>Photo</th>
                            <th>Price</th>
                            <th>Manufacturer</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($result as $row){?>
                        <tr>
                            <td><?php echo $row['product_name'];?></td>
                            <td><img src="../../assets/temp/imgs/<?php echo $row['photos']?>" height="200" alt=""></td>
                            <td><?php echo $row['price'];?>K</td>
                            <td><?php echo $row['manufacturer_name'];?></td>
                            <td>
                                <a class="btn btn-warning" href="form_update.php?id=<?php echo $row['id'];?>">Edit <i
                                        class="bi bi-pencil-square"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="form_delete.php?id=<?php echo $row['id'];?>">Delete <i
                                        class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include '../includes/footer.php';?>