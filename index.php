<?php
session_start();
include("connection.php");
include("functions.php");

// Check if user is logged in
$user_data = check_login($con);
?>
