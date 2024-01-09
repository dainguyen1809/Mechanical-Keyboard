<?php include './includes/navbar.php';?>

<?php include './includes/searchbar.php';?>

<?php include './includes/header.php';?>

<?php
    require './config/connect.php';
    
    $manu_name = $_GET['manufactuers_name'];
    $sql = "select products.*,
    manufacturers.id as manu_id, manufacturers.manufacturers_name as manu_name
    from products
    join manufacturers on manufacturers.id = products.manufacturer_id
    where manufacturers.manufacturers_name like '%$manu_name%'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
?>

<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Keyboard Store</h1>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-xl-3">
                    </div>
                    <div class="col-6"></div>
                    <div class="col-xl-3">
                        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                            <label for="fruits">Default Sorting:</label>
                            <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3"
                                form="fruitform">
                                <option value="opel">Linear</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Categories</h4>
                                    <ul class="list-unstyled fruite-categorie">
                                        <?php require './repository/categories.php';?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4 class="mb-2">Price</h4>
                                    <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput"
                                        min="0" max="5000" value="0" oninput="amount.value=rangeInput.value">
                                    <output id="amount" name="amount" min-velue="0" max-value="5000"
                                        for="rangeInput">0</output><span>K</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <h4>Additional</h4>
                                    <div class="mb-2">
                                        <input type="radio" class="me-2" id="Categories-1" name="Categories-1"
                                            value="Beverages">
                                        <label for="Categories-1"> Linear</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row g-4 justify-content-center">
                            <?php if($num_rows == 0) {?>
                            <div class="row">
                                <h1>Cannot find products for manufacturers</h1>
                                <a class="btn btn-primary col-3" href="shop.php">&leftarrow; Back To Shop</a>
                            </div>
                            <?php } else {?>
                            <?php foreach($result as $each){?>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <a href="detail.php?id=<?php echo $each['id'];?>">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img">
                                            <img src="./assets/temp/imgs/<?php echo $each['photos'];?>"
                                                class="img-fluid w-100 rounded-top" alt="">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute"
                                            style="top: 10px; left: 10px;"> <?php echo $each['manu_name'];?>
                                        </div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                            <h4><?php echo $each['product_name'];?></h4>
                                            <h5>
                                                <span class="text-primary">Brand:
                                                </span><?php echo $each['manu_name'];?>
                                            </h5>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">
                                                    <?php echo $each['price'];?>K
                                                </p>
                                                <a href="./handlers/add_to_cart.php?id=<?php echo $each['id'];?>"
                                                    class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                    cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php }?>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fruits Shop End-->
<?php include './includes/footer.php';?>