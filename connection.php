<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$con = mysqli_connect('localhost', 'root', '', 'login'); 
if (!$con) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
