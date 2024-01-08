<?php

    $token = $_GET['token'];

    require './config/connect.php';

    $sql = "select * from forgot_password where token = '$token'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 0) {
        header("index.php");
        exit;
    }

?>

<?php include './includes/navbar.php';?>

<div class="container pt-5">
    <!-- Outer Row -->
    <div class="row justify-content-center pt-5">
        <div class="col-lg-12 p-5">
            <div class=" card o-hidden border-0 my-5">
                <div class="card-body p-5">
                    <form class="user" method="post" action="./handlers/process_change_new_password.php">
                        <input type="hidden" name="token" value="<?php echo $token; ?>">
                        <div class="form-group mb-4">
                            <label for="password">Please Enter New Password</label>
                            <input type="password" class="form-control form-control-user mt-3" name="password" />
                        </div>
                        <div class="text-start">
                            <button class="btn btn-primary col-3">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './includes/footer.php';?>