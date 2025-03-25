<?php
session_start(); // Start session for login management

// Database connection
$con = mysqli_connect('sql303.infinityfree.com', 'if0_38330023', 'BG0b6db2G5', 'if0_38330023_Data');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize error message
$error_message = "";

// Check if username and password are provided
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Use prepared statements to prevent SQL injection
        $stmt = $con->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Fetch hashed password
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $username; // Store session data
                header('Location: face.html'); // Redirect on successful login
                exit();
            } else {
                $error_message = "Invalid password.";
            }
        } else {
            $error_message = "User does not exist.";
        }

        // Close statement
        $stmt->close();
    } else {
        $error_message = "Please fill in both username and password fields.";
    }
}

// Close connection
$con->close();
?>
