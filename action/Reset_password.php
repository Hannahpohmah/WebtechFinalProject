<?php

session_start();
include('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = password_hash($_POST["newpassword"], PASSWORD_DEFAULT);
    $email = $_SESSION['email'];
    
    
    $sql4 = "UPDATE user SET passwd = ? WHERE email = ?";

    // Prepare the statement
    $stmt4 = $conn->prepare($sql4);
    
    
    $stmt4->bind_param("ss", $password, $email);
    
    // Execute the statement
    $result = $stmt4->execute();

    
    if($result) {
        // If the update is successful
        echo "Password updated successfully.";
        header("Location: ../action/logout.php"); 
        exit();
    } else {
        // If the update fails
        echo "Error updating password.";
        header("Location: ../view/home_set_new_password.php"); 
        exit();
    }
}

?>
