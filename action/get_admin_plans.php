<?php
require_once('../settings/connection.php');


function getAllplans() {
    global $conn;
    $userId = $_SESSION['user_id'];


    $query = "SELECT category_id FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Error retrieving provider's category ID: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    $categoryId = $row['category_id'];

    // Query to get all services based on the provider's category ID
    $query = "SELECT * FROM homemaintenanceplans WHERE cid = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $categoryId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Error retrieving services: " . mysqli_error($conn));
    }

    $plans = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $services[] = $row;
    }

    return $plans;
}

// Example usage
// $services = getAllServices();
// var_dump($services);
?>