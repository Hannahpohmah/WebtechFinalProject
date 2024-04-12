<?php
include '../settings/connection.php';

// Check if chore ID is provided in the URL
if(isset($_GET['id'])) {
    $Id = $_GET['id'];

    // DELETE query
    $sql = "DELETE FROM homemaintenanceplans WHERE plan_id = $Id";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Redirect back to chore control view
        header("Location: ../g_view/maintenancePlans.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    
    $conn->close();
} else {
    // Redirect if chore ID is not provided
    header("Location: ../g_view/maintenancePlans.php");
    exit();
}
?>