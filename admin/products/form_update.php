<?php include '../includes/navbar.php';?>

<?php
    require '../../config/connect.php';

    $id = $_GET['id'];

    $query = "select * from products where id = '$id'";
    $prods = mysqli_query($conn, $query);   
    $each = mysqli_fetch_array($prods);

    $sql = "select * from manufacturers";
    $manufacturers = mysqli_query($conn, $sql);
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Form Insert Products</h3>
        </div>
    </div>
    <div class="row">
        <?php 
            if(isset($_GET['error'])){
        ?>
        <span class="text-danger"><?php echo $_GET['error'];?></span>
        <?php }?>
    </div>
    <form action="./handlers/process_update.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $each['id'];?>">
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input name="product_name" type="text" class="form-control" id=""
                value="<?php echo $each['product_name'];?>">
        </div>
        <div class="mb-3">
            <label for="photo_new" class="form-label">Photo New</label>
            <input name="photo_new" type="file" class="form-control" id="">
        </div>
        <div class="mb-3">
            <h5 for="photos" class="form-label">Keep Photo Old &quest;</h5>
            <input name="photo_old" type="hidden" class="form-control" id="" value="<?php echo $each['photos'];?>">
            <img class="mt-2" src="../../assets/temp/imgs/<?php echo $each['photos']?>" height="250" alt="">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input name="price" type="number" class="form-control" id="" value="<?php echo $each['price'];?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" type="number" class="form-control" id="" cols="30"
                rows="10"><?php echo $each['description'];?></textarea>
        </div>
        <div class="mb-3">
            <select class="form-select col-sm-3" aria-label="Default select example" name="manufacturer_id">
                <?php foreach($manufacturers as $manufacturer){?>
                <option value="<?php echo $manufacturer['id'];?>"
                    <?php if($each['manufacturer_id'] == $manufacturer['id']){?> selected <?php }?>>
                    <?php echo $manufacturer['manufacturers_name'];?>
                </option>
                <?php }?>
            </select>
        </div>
        <div class="row">
            <div class="col-10">
                <button class="col-3 btn btn-primary">Update</button>
                <a href="index.php" class="col-3 btn btn-secondary">&leftarrow; Back To Dashboard</a>
            </div>
        </div>
    </form>
</div>

<?php include '../includes/footer.php';?>