<?php
session_start();

// Retrieve and sanitize user inputs
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

// Define allowed usernames and the common password
$allowedUsernames = array("Mark", "Nicole", "Francis", "Jessa", "admin");
$allowedPassword = "12345";

// Database credentials
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "dbuser";

// Create a connection to the database
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
}

// Validate inputs
if (empty($username) && empty($password)) {
    $_SESSION['error'] = "Empty Username and Password";
    header("Location: ../index.php");
    exit();
} elseif (empty($username)) {
    $_SESSION['error'] = "Empty Username";
    header("Location: ../index.php");
    exit();
} elseif (empty($password)) {
    $_SESSION['error'] = "Empty Password";
    header("Location: ../index.php");
    exit();
} else {
    // Check if the username is valid and the password matches
    if (in_array($username, $allowedUsernames) && $password === $allowedPassword) {
        $_SESSION['status'] = TRUE;
        $_SESSION['username'] = $username;

        // Insert user data into the database
        $stmt = $conn->prepare("INSERT INTO account (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            if ($username === "admin") {
                header("Location: ../admin/admin.php");
            } else {
                header("Location: ../user/user.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Error: " . $stmt->error;
            header("Location: ../index.php");
            exit();
        }

        $stmt->close();
    } else {
        $_SESSION['error'] = "Invalid Username and Password";
        header("Location: ../index.php");
        exit();
    }
}

$conn->close();
?>
