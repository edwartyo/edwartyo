<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($conn, $_POST["confirm_password"]);
    
    // Basic validation
    if (strlen($username) < 5) {
        die("Username must be at least 5 characters long");
    }
    
    if (strlen($password) < 8) {
        die("Password must be at least 8 characters long");
    }
    
    if ($password !== $confirm_password) {
        die("Passwords do not match");
    }
    
    // Check if username exists
    $check_query = "SELECT id FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($result) > 0) {
        die("Username already exists");
    }
    
    // Insert new user
    $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    
    if (mysqli_query($conn, $insert_query)) {
        header("Location: index.html?registration=success");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?> 