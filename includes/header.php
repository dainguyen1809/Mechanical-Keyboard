<?php 
    require './config/connect.php';
    $sql = "select * from manufacturers";
    $result = mysqli_query($conn, $sql);
    $each = mysqli_fetch_array($result);
?>
<!-- Hero Start -->
<div class="container-fluid py-5 mb-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-secondary">100% High Quality</h4>
                <h1 class="mb-5 display-5 text-primary">All things related to Mechanical Keyboards</h1>
                <div class="position-relative mx-auto">
                    <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number"
                        placeholder="Search">
                    <button type="submit"
                        class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
                        style="top: 0; right: 25%;">Submit Now</button>
                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <img src="./assets/temp/imgs/17041749078-1701677109746.webp"
                                class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">
                                <?php echo $each['manufacturers_name'];?>
                            </a>
                        </div>
                        <div class="carousel-item rounded">
                            <img src="./assets/temp/imgs/17041818184.webp" class="img-fluid w-100 h-100 rounded"
                                alt="Second slide">
                            <a href="#"
                                class="btn px-4 py-2 text-white rounded"><?php echo $each['manufacturers_name'];?></a>
                        </div>
                        <div class="carousel-item rounded">
                            <img src="./assets/temp/imgs/17041814911.webp" class="img-fluid w-100 h-100 rounded"
                                alt="Second slide">
                            <a href="#"
                                class="btn px-4 py-2 text-white rounded"><?php echo $each['manufacturers_name'];?></a>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->