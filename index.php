<?php

include('connection.php');
include('functions.php');

session_start();

check_login($conn);

if (isset($_POST['addSub'])) {
    addSub($conn);
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
    <div class="container">
        <h1>Notesplus</h1>
        <a href="logout.php">Logout</a>
        <div class="row col-container">
            <?php
            $query = "SELECT * FROM subjects";
            $result = mysqli_query($conn, $query);

            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                $subDetails = mysqli_fetch_assoc($result);

            ?>
                <div class="col-sm-4">
                    <div class="subject-box">
                        <h2><?php echo $subDetails['subject']; ?></h2>
                        <div class="row align-items-center">
                            <div class="col-3">
                                <img class="img-fluid" src="images/books.png" alt="Books">
                            </div>
                            <div class="col-9">
                                <p><?php echo $subDetails['description']; ?></p>
                            </div>
                            <a href="subjectpage.php?sid=<?php echo $subDetails['id'] ?>" class="btn-custom">Enter</a>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- Add Subjects Button -->
    <button type="button" class="btn btn-custom rounded-circle addSubBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-plus"></i>
    </button>

    <!-- Modal Add Subjects-->
    <div class="modal fade addSubModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <h2 class="modal-title" id="exampleModalLabel">Enter Subject Details</h2>
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="addSubName" placeholder="Subject Name">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="addSubDes" id="" rows="5" placeholder="Subject Description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-custom" name="addSub">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="js/fontawesome.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>