<?php
include '../settings/connection.php';

// Check if the request is a POST request
// Retrieve plan ID
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $planName = $_POST['plan'];
    $details = $_POST['details'];
    $frequencyName = $_POST['frequency'];
    $sql = "SELECT id FROM plan WHERE planName = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $planName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $pid = mysqli_fetch_assoc($result)['id'];

    // Retrieve frequency ID
    $sql = "SELECT id FROM frequency WHERE frequency_name = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $frequencyName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $frequencyId = mysqli_fetch_assoc($result)['id'];

    // Update the homemaintenanceplans table
    $sql = "UPDATE homemaintenanceplans SET pid = ?, Details = ?, frequency = ? WHERE Plan_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "issi", $pid, $details, $frequencyId, $_POST['planId']);

    if (mysqli_stmt_execute($stmt)) {
        echo "successfully";
        header("Location: ../g_view/maintenancePlans.php");
    } else {
        echo json_encode(["success" => false, "error" => mysqli_error($conn)]);
    }

    mysqli_stmt_close($stmt); // Close the prepared statement
    mysqli_close($conn); // Close the database connection
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>
