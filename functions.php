<?php

function check_login($conn)
{
    if (isset($_SESSION['email'])) {
        $emailid = $_SESSION['email'];
        $query = "SELECT * FROM users WHERE email = '$emailid' limit 1";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $useremail = mysqli_fetch_assoc($result);
            return $useremail;
        }
    }

    header('Location: login.php');
    die();
}

function login($conn)
{
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM users WHERE email = '$email'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        if (password_verify($pass, $row['password'])) {
            $_SESSION['email'] = $email;
            header('Location: index.php');
        }
    } else {
        echo '<script>alert("Something Is Wrong I can feel it")</script>';
    }
}

function signup($conn)
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if ($pass == $cpass) {
        $passhash = password_hash($pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name','$email','$passhash')";

        mysqli_query($conn, $query);
        header('Location: login.php');
    } else {
        echo '<script>alert("Something Is Wrong I can feel it")</script>';
    }
}
