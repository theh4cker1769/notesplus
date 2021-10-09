<?php

include('connection.php');
include('functions.php');

session_start();

check_login($conn);

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
        <h1>Notesplus</h1>
        <a href="logout.php">Logout</a>
        <div class="row col-container">
            <?php
                $query = "SELECT * FROM subjects";
                $result = mysqli_query($conn, $query);

                for($i=0; $i<mysqli_num_rows($result); $i++){
                    $subDetails = mysqli_fetch_assoc($result);
                
            ?>
            <div class="col-sm-4">
                <div class="subject-box">
                    <h2><?php echo $subDetails['subject'];?></h2>
                    <div class="row align-items-center">
                        <div class="col-3">
                            <img class="img-fluid" src="images/books.png" alt="Books">
                        </div>
                        <div class="col-9">
                            <p><?php echo $subDetails['description'];?></p>
                        </div>
                        <a href="subjectpage.php?sid=<?php echo $subDetails['id']?>" class="btn-custom">Enter</a>
                    </div>
                    
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>

    <script src="js/fontawesome.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>