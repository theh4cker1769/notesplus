<?php

include('connection.php');
include('functions.php');

session_start();

check_login($conn);

if (isset($_POST['addSub'])) {
    addSub($conn);
}

include('includes/head.php');

$page = 'home';
include('includes/navbar.php');

?>

<?php //$page = 'home'; include 'includes/navbar.php' ?>

<div class="container">
    <h1>Notesplus</h1>
    <div class="row g-4">
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
<?php

if (role($conn)) {

?>
    <button type="button" class="btn btn-custom rounded-circle addSubBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-plus"></i>
    </button>
<?php
}
?>

<!-- Modal Add Subjects-->
<div class="modal fade addSubModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
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

<?php include('includes/foot.php') ?>