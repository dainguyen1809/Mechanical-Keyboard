<?php include '../includes/navbar.php';?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class="text-center">Form Insert Manufacturer</h3>
        </div>
    </div>
    <div class="row">
        <?php 
            if(isset($_GET['error'])){
        ?>
        <span class="text-danger"><?php echo $_GET['error'];?></span>
        <?php }?>
    </div>
    <form action="./handlers/process_insert.php" method="post">
        <div class="mb-3">
            <label for="manufacturers_name" class="form-label">Manufacturer Name</label>
            <input name="manufacturers_name" type="text" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input name="address" type="text" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input name="phone" type="text" class="form-control" id="">
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