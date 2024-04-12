<?php
require_once('../settings/connection.php');


function getAllServices() {
    global $conn;
    $userId = $_SESSION['user_id'];
    

    // Query to get all services based on the provider's category ID
    $query = "SELECT * FROM servicerequests WHERE status_changed_by = ? AND status='Accepted' ";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
       
        die("Error retrieving services: " . mysqli_error($conn));
    }

    $services = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }
   
    return $services;
}


?>
