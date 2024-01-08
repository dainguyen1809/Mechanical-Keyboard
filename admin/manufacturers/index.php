<?php require '../check_admin.php';?>

<?php include '../includes/navbar.php';?>

<?php 
    require '../../config/connect.php';

    $pages = 1;
    if(isset($_GET['pages'])){
        $pages = $_GET['pages'];
    }

    $sql_num_manufacturers = "select count(*) from manufacturers where manufacturers_name like '%$search%'";
    $arr_num_manufacturers = mysqli_query($conn, $sql_num_manufacturers);
    $result_num_manufacturers = mysqli_fetch_array($arr_num_manufacturers);
    $num_manufacturers = $result_num_manufacturers['count(*)'];
    $num_manu_on_pages = 3;

    $num_pages = ceil($num_manufacturers / $num_manu_on_pages);
    
    $skip_pages = $num_manu_on_pages* ($pages - 1);
    
    $sql = "select * from manufacturers
    where manufacturers_name like '%$search%'
    limit $num_manu_on_pages offset $skip_pages
    ";
    $result = mysqli_query($conn, $sql);

    
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Management Manufacturers</h1>
    <p class="mb-4"><a class="btn btn-primary" href="form_insert.php">Add
            Manufacturer <i class="fas fa-user-plus"></i></a></p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Manufacturers</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Manufacturer Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Manufacturer Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($result as $each){?>
                        <tr>
                            <td>
                                <?php echo $each['manufacturers_name'];?>
                            </td>
                            <td>
                                <?php echo $each['address'];?>
                            </td>
                            <td>
                                <?php echo $each['phone'];?>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="form_update.php?id=<?php echo $each['id'];?>">Edit <i
                                        class="bi bi-pencil-square"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="form_delete.php?id=<?php echo $each['id'];?>">Delete <i
                                        class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
            <div class="row text-start pt-5 border-top">
                <div class="col-md-12">
                    <div class="custom-pagination">
                        <?php for($i = 1; $i <= $num_pages; $i++){?>
                        <a class="btn btn-outline-secondary" href="?pages=<?php echo $i?>">
                            <?php echo $i?>
                        </a>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->

<?php include '../includes/footer.php';?>