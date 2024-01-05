<?php include './includes/navbar.php';?>


<?php

    if(isset($_COOKIE['remember'])){
        $token = $_COOKIE['remember'];
        
        require '../config/connect.php';
        
        $sql = "select * from customers
        where token = '$token' limit 1";
        $result = mysqli_query($conn, $sql);

        $num_rows = mysqli_num_rows($result);

        if($num_rows == 1){
            $row = mysqli_fetch_array($result);
            $_SESSION['id'] = $row['id'];
            $_SESSION['customer_name'] = $row['customer_name'];
        }
    }

    if(isset($_SESSION['id'])){
        header("location: customer.php");
        exit;
    }
?>


<div class="container pt-5">
    <!-- Outer Row -->
    <div class="row justify-content-center pt-5">
        <div class="col-lg-12">
            <div class=" card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <?php if(isset($_SESSION['error'])){ ?>
                                <span class="text-danger">
                                    <?php echo $_SESSION['error'];?>
                                </span>
                                <?php unset($_SESSION['error']);?>
                                <?php }?>
                                <form class="user" method="post" action="./handlers/process_signin.php">
                                    <div class="form-group mb-4">
                                        <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address..." name="email" />
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password" />
                                    </div>
                                    <div class="form-group  mb-4">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck"
                                                name="remember" />
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block">
                                        Signin
                                    </button>
                                    <hr />
                                    <a href="#" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="#" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with
                                        Facebook
                                    </a>
                                </form>
                                <hr />
                                <div class="text-center">
                                    <a class="small" href="#">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="signup.php">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './includes/footer.php';?>