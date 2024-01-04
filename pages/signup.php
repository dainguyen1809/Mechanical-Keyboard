<?php session_start();?>

<?php include './includes/navbar.php';?>



<div class="container pt-5">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row pt-5">
                <div class="col-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <?php if(isset($_SESSION['error'])){ ?>
                        <span class="text-danger">
                            <?php echo $_SESSION['error'];?>
                        </span>
                        <?php unset($_SESSION['error']);?>
                        <?php }?>
                        <form class="user" method="post" action="./handlers/process_signup.php">
                            <div class="form-group mb-4">
                                <input type="text" class="form-control form-control-user" id=""
                                    placeholder="Customer Name" name="customer_name">
                            </div>
                            <div class="form-group mb-4">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Email Address" name="email">
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                    placeholder="Password" name="password">
                                <!-- <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user"
                                        id="exampleRepeatPassword" placeholder="Repeat Password">
                                </div> -->
                            </div>
                            <button class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                            <hr>
                            <a href="#" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i> Register with Google
                            </a>
                            <a href="#" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                            </a>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="#">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="signin.php">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include './includes/footer.php';?>