<?php

include('connection.php');
include('functions.php');

session_start();

check_login($conn);

$getsid = $_GET['sid'];

$query = "SELECT * FROM subjectpage WHERE sid = '$getsid'";
$result = mysqli_query($conn, $query);

$queryMain = "SELECT * FROM subjects WHERE id = '$getsid'";
$resultMain = mysqli_query($conn, $queryMain);
$getDataMain = mysqli_fetch_assoc($resultMain);
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
    <div class="container">
        <section class="subdetails">
            <div class="card">
                <div class="card-body">

                    <h1><?php echo $getDataMain['subject']?></h1>
                    <p><?php echo $getDataMain['description']?></p>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-sm-3">
                <section class="files-info">
                    <div class="card">
                        <div class="card-body">
                            <h3>Total No of Files: 84</h3>
                            <h4><b>PDF:</b>44</h4>
                            <h4><b>PPT:</b>20</h4>
                            <h4><b>Docs:</b>20</h4>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-sm-9">
                <section class="files">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                                $getData = mysqli_fetch_assoc($result);

                            ?>
                                <div class="notes-box">
                                    <div class="row align-items-center">
                                        <div class="col-10">

                                            <h4><?php echo $getData['filename']; ?></h4>

                                            <div class="clearfix">
                                                <p>Oct 3 2021</p><span>PDF</span>
                                            </div>
                                            <a href="#" class="btn-custom">Download</a>
                                        </div>
                                        <div class="col-2 border-left">
                                            <img class="img-fluid rounded-circle" src="images/profile.jpg" alt="Profile">
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>

    <script src="js/fontawesome.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>