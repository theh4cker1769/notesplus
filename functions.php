<?php

function check_login($conn){
    if(isset($_SESSION['email'])){
        $emailid = $_SESSION['email'];
        $query = "SELECT * FROM users WHERE email = '$emailid' limit 1";

        $result = mysqli_query($conn, $query);

        if(mysqli_num_rows($result)>0)
        {
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

    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        $_SESSION['email'] = $email;
        header('Location: index.php');
    }
    else{
        echo '<script>alert("Hello world")</script>';
    }
}

function signup($conn){
    
}


?>