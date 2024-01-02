<?php include '../includes/navbar.php';?>

<?php
    require '../../config/connect.php';

    $sql = "select * from manufacturers";
    $result = mysqli_query($conn, $sql);
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
    <form action="./handlers/process_insert.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input name="product_name" type="text" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="photos" class="form-label">Photo</label>
            <input name="photos" type="file" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input name="price" type="number" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" type="number" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="mb-3">
            <select class="form-select col-sm-3" aria-label="Default select example" name="manufacturer_id">
                <?php foreach($result as $opt){?>
                <option value="<?php echo $opt['id'];?>">
                    <?php echo $opt['manufacturers_name'];?>
                </option>
                <?php }?>
            </select>
        </div>
        <div class="row">
            <div class="col-10">
                <button class="col-3 btn btn-primary">Create</button>
                <a href="index.php" class="col-3 btn btn-secondary">&leftarrow; Back To Dashboard</a>
            </div>
        </div>
    </form>
</div>

<?php include '../includes/footer.php';?>