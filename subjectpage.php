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


if (isset($_POST['uploadNotes'])) {
    uploadNotes($conn);
}

if (isset($_POST['deleteSub'])) {
    deleteSub($conn);
}

// if(isset($_POST['searchBtn'])){
//     searchBar($conn);
// }


include('includes/head.php');
include('includes/navbar.php');
?>



<div class="container">
    <form method="POST" class="custom-search">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Serch Your Files Here" name="searchValue">
            <button class="btn btn-outline-secondary" type="submit" id="searchBtn" name="searchBtn">Search</button>
        </div>
    </form>
    <section class="subdetails">
        <div class="card">
            <div class="card-body">

                <h1><?php echo $getDataMain['subject'] ?></h1>
                <p><?php echo $getDataMain['description'] ?></p>
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
                <button type="button" class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#uploadNotes">
                    Upload Notes
                </button>
                <?php

                if (role($conn)) {

                ?>
                    <form method="POST">
                        <button type="submit" class="btn btn-custom bg-red" name="deleteSub">
                            Delete Subject
                        </button>
                    </form>
                <?php
                }
                ?>
            </section>
        </div>
        <div class="col-sm-9">
            <section class="files">
                <div class="card">
                    <div class="card-body withoutSearch">
                        <?php
                        for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                            $getData = mysqli_fetch_assoc($result);
                            $dateOnly = $getData['uploaded_on'];
                        ?>
                            <div class="notes-box">
                                <div class="row align-items-center">
                                    <div class="col-10">

                                        <h4><?php echo $getData['filedetails']; ?></h4>

                                        <div class="clearfix">
                                            <p><?php echo date('M d, Y', strtotime($dateOnly)) ?></p><span>PDF</span>
                                        </div>
                                        <a href="uploads/<?php echo $getData['filename'] ?>" class="btn-custom" download>Download</a>
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


<!-- Modal Upload Notes-->
<div class="modal fade addSubModal" id="uploadNotes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="modal-title" id="exampleModalLabel">Enter Notes Details</h2>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="uploadFileDet" placeholder="File Details">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="uploadFile">
                    </div>
                    <button type="submit" class="btn btn-custom" name="uploadNotes">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/foot.php') ?>