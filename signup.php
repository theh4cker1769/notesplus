<?php

include('connection.php');
include('functions.php');

session_start();

if(isset($_POST['loginBtn'])){
    signup($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
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
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <a href="#" class="forgot mx-1">
                                Forgot?
                            </a>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <button type="submit" class="btn btn-custom" name="loginBtn">Submit</button>
                    </form>
                    <p class="not-a-member">Not a member? <a href="#" class="signup mx-1">Sign up now</a></p>
                </div>
            </div>
        </div>
    </section>

    <script src="js/fontawesome.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>