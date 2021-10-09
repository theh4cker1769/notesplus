<?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'notesplus';

if(!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
    echo 'Hello World';
}


?>

