<?php
// Start the session to access $_SESSION variables
session_start();
include ('../settings/connection.php');

if (isset($_GET['id']) && isset($_GET['review'])) {
    global $conn; // Access the global $conn variable

    $UserID = $_SESSION['user_id'];
    $vendor_id = $_GET['id'];
    $review_text = $_GET['review'];

    // Insert the review into the database
    $sql = "INSERT INTO reviews (provider_id, review_text, user_id) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iss", $vendor_id, $review_text, $UserID);
    
    // Execute and check if successful
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../g_view/viewprovider.php?id=$vendor_id");
        exit(); // Exit to prevent further output
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt); // Close the prepared statement
    mysqli_close($conn); // Close the database connection
} else {
    echo "Error: Invalid request method.";
}
?>

