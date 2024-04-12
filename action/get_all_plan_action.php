<?php

include '../settings/connection.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];

function getAllplan($user_id) {
    global $conn;

    // SELECT all chores query
    $sql = "SELECT * FROM homemaintenanceplans WHERE user_id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "i", $user_id );

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check if execution worked
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    // Check if any record was returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch records if above is successful and assign to variable
        $plans = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // Return the result variable
        return $plans;
    } else {
        return null;
    }
}
?>
