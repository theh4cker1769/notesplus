<?php

include('connection.php');
include('functions.php');

session_start();

if(isset($_POST['loginBtn'])){
    login($conn);
}

include('includes/head.php');
?>

    <section class="login">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center mb-2">Login With</h1>
                    <div class="social">
                        <a href="#" class="btn-face"><i class="fab fa-facebook"></i> Facebook</a>
                        <a href="#" class="btn-face goo"><i class="fab fa-google"></i> Google</a>
                    </div>
                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <button type="submit" class="btn btn-custom" name="loginBtn">Login</button>
                    </form>
                    <p class="not-a-member">Not a member? <a href="signup.php" class="signup mx-1">Sign up now</a></p>
                </div>
            </div>
        </div>
    </section>


<?php include('includes/foot.php') ?>