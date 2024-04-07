<?php
// Start session
session_start();

// Include the connection file
include '../settings/connection.php'; 

// Collect form data and store in variables
$email = $_POST['email'];
$password = $_POST['password'];

// Write a query to SELECT a record from the People table using the email
$sql = "SELECT * FROM users WHERE email = '$email'";

// Execute the query
$result = $conn->query($sql);

// Check if any row was returned
if ($result->num_rows == 0) {
    
    echo '<script>
            alert("User email is incorrect or not registered!");
            setTimeout(function() {
                window.location.href = "../g_view/home.php";
            }, 100); // Delay in milliseconds
          </script>';
    exit(); // Make sure to exit after the alert and redirection
}


// Fetch the record
$row = $result->fetch_assoc();

// Verify password user provided against database record
if (password_verify($password, $row['password'])) {
    // Create a session for user id and role id
    $_SESSION['user_id'] = $row['user_id']; 
    $_SESSION['role_id'] = $row['roleId']; 
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['lname'] = $row['lname'];

    // Redirect based on role
    if ($_SESSION['role_id'] == 2) { 
        header("Location: ../g_view/dash.php");
        exit();
    } else { 
        header("Location: ../g_view/admin.php");
        exit();
    }
} else {
    // Incorrect password
    echo '<script>
            alert("Incorrect password!");
            setTimeout(function() {
                window.location.href = "../g_view/home.php";
            }, 100); // Delay in milliseconds
          </script>';
    exit(); // Make sure to exit after the alert and redirection
}

// Close the connection
// $conn->close();


