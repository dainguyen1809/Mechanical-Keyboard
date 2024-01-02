<?php include '../includes/navbar.php';?>

<?php
    require '../../config/connect.php';

    $id = $_GET['id'];
    
    $sql = "select products.*,
    manufacturers.manufacturers_name as manufacturer_name
    from products
    join manufacturers on manufacturers.id = products.manufacturer_id
    where products.id = '$id'";
    
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
?>
<!-- Single Product Start -->
<div class="container mt-5">
    <div class="row">
        <a href="index.php" class="btn btn-primary">&leftarrow; Back To Dashboard</a>
    </div>
    <div class="container py-5">
        <div class="g-4 mb-5">
            <div class="col-lg-8 col-xl-12">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="../../assets/temp/imgs/<?php echo $row['photos'];?>" class="img-fluid rounded"
                                    alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3"><?php echo $row['product_name'];?></h4>
                        <p class="mb-3">Brand: <span class="text-primary"><?php echo $row['manufacturer_name'];?></span>
                        </p>
                        <h5 class=" fw-bold mb-3">
                            <?php echo $row['price'];?>.000
                        </h5>
                        <div class="d-flex mb-4">
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Description</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p><?php echo nl2br($row['description']);?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Single Product End -->

<?php include '../includes/footer.php';?>