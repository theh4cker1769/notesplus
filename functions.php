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
        echo '<script>alert("Wrong I can feel it")</script>';
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


function addSub($conn)
{
    $subName = $_POST['addSubName'];
    $subDes = $_POST['addSubDes'];


    $query = "INSERT INTO `subjects`(`subject`, `description`) VALUES ('$subName','$subDes')";
    mysqli_query($conn, $query);
}

function uploadNotes($conn)
{
    $getsid = $_GET['sid'];
    $statusMsg = '';

    $fileDetails = $_POST['uploadFileDet'];
    $targetDir = "uploads/";
    $fileName = basename($_FILES["uploadFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($_FILES["uploadFile"]["name"])) {
        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'docx');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $targetFilePath)) {
                $query = "INSERT INTO `subjectpage`(`sid`, `filedetails`, `filename`) VALUES ('$getsid', '$fileDetails', '$fileName')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
                    header("Refresh:0");
                } else {
                    $statusMsg = "File upload failed, please try again.";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, DOC & PDF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select a file to upload.';
    }

    echo $statusMsg;
}

function deleteSub($conn)
{
    $getsid = $_GET['sid'];

    $query = "DELETE FROM `subjects` WHERE `id` = $getsid";
    mysqli_query($conn, $query);

    header("Location: index.php");
}

function role($conn)
{
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $query = "SELECT role from users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);

        if ($row['role'] == 'admin') {
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function getName($conn){
    $email = $_SESSION['email'];
    $query = "SELECT name FROM users WHERE email= '$email'";
    $result = mysqli_query($conn, $query);
    $nameGet = mysqli_fetch_assoc($result);
    $_SESSION['name'] = $nameGet['name'];
}


function searchBar($conn){
    $searchValue = $_POST['searchValue'];
    $min_length = 3;
    if(strlen($searchValue)>=$min_length){
        $query = "SELECT * FROM subjectpage WHERE (`filedetails` LIKE '%".$searchValue."%')";
        $searchFiles = mysqli_query($conn, $query);
        if(mysqli_num_rows($searchFiles) > 0){
			while($results = mysqli_fetch_array($searchFiles)){
			
				$_SESSION['searchResult'] = $results;
			}
		}
		else{
			echo "No results";
		}
    }
	else{
		echo "Minimum length is ".$min_length;
	}
}