<?php

include('connection.php');
include('functions.php');

session_start();

if (isset($_POST['signupBtn'])) {
    signup($conn);
}

include('includes/head.php');
?>


    <section class="login">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-2">Sign Up With</h1>
                    <div class="social">
                        <a href="#" class="btn-face"><i class="fab fa-facebook"></i> Facebook</a>
                        <a href="#" class="btn-face goo"><i class="fab fa-google"></i> Google</a>
                    </div>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="cpass">
                        </div>
                        <button type="submit" class="btn btn-custom" name="signupBtn">Sign Up</button>
                    </form>
                    <p class="not-a-member">Already Have an Account? <a href="login.php" class="signup mx-1">Login Now</a></p>
                </div>
            </div>
        </div>
    </section>


<?php include('includes/foot.php') ?>