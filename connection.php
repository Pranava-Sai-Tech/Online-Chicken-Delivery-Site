<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$con = mysqli_connect('sql303.infinityfree.com', 'if0_38330023', 'BG0b6db2G5', 'if0_38330023_Data');

if (!$con) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
