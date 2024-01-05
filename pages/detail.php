<?php include './includes/navbar.php';?>

<?php include './includes/searchbar.php';?>

<?php include './includes/header.php';?>

<?php
    require '../config/connect.php';

    $id = $_GET['id'];
    
    $sql_manu = "select * from manufacturers";
    $manufacturers = mysqli_query($conn, $sql_manu);
    
    $sql = "select products.*,
    manufacturers.manufacturers_name as manufacturer_name
    from products
    join manufacturers on manufacturers.id = products.manufacturer_id
    where products.id = '$id'";
    $result = mysqli_query($conn, $sql);
    $each = mysqli_fetch_array($result);
?>

<!-- Single Product Start -->
<div class="container-fluid py-5 mt-5">
    <div class="container py-5">
        <div class="row g-4 mb-5">
            <div class="col-lg-8 col-xl-9">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="border rounded">
                            <a href="#">
                                <img src="../assets/temp/imgs/<?php echo $each['photos'];?>" class="img-fluid rounded"
                                    alt="Image">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="fw-bold mb-3">
                            <?php echo $each['product_name'];?>
                        </h4>
                        <p class="mb-3"><span class="text-primary">Brand:</span>
                            <?php echo $each['manufacturer_name'];?>
                        </p>
                        <h5 class="fw-bold mb-3"><?php echo $each['price'];?>K</h5>
                        <div class="d-flex mb-4">
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="input-group quantity mb-5" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <a href="./handlers/add_to_cart.php?id=<?php echo $each['id'];?>"
                            class="btn border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                    </div>
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Description</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                    aria-controls="nav-mission" aria-selected="false" disabled>Reviews</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p><?php echo nl2br($each['description']);?></p>
                            </div>
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="../assets/img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Jason Smith</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition injected
                                            humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="../assets/img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Sam Peters</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                            repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="nav-vision" role="tabpanel">
                                <p class="text-dark">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor
                                    sit. Aliqu diam
                                    amet diam et eos labore. 3</p>
                                <p class="mb-0">Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.
                                    Clita erat ipsum et lorem et sit</p>
                            </div>
                        </div>
                    </div>
                    <form action="#">
                        <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="text" class="form-control border-0 me-4" placeholder="Your Name *">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="email" class="form-control border-0" placeholder="Your Email *">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                    <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                                        placeholder="Your Review *" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Please rate:</p>
                                        <div class="d-flex align-items-center" style="font-size: 12px;">
                                            <i class="fa fa-star text-muted"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <a href="#" class="btn border border-secondary text-primary rounded-pill px-4 py-3">
                                        Post Comment</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                <div class="row g-4 fruite">
                    <div class="col-lg-12">
                        <div class="input-group w-100 mx-auto d-flex mb-4">
                            <input type="search" class="form-control p-3" placeholder="keywords"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                        <div class="mb-4">
                            <h4>Categories</h4>
                            <ul class="list-unstyled fruite-categorie">
                                <?php foreach($manufacturers as $each){?>
                                <li>
                                    <div class="d-flex justify-content-between fruite-name">
                                        <a href="#">
                                            <?php echo $each['manufacturers_name'];?>
                                        </a>
                                        <span>(3)</span>
                                    </div>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include '../repository/related_products.php';?>
    </div>
</div>
<!-- Single Product End -->

<?php include './includes/footer.php';?>