<?php
function check_login($con)
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE user_id = '$id' LIMIT 1";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }

    // If login fails, redirect
    header("Location: login.php");
    exit();
}
?>
