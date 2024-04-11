<?php
include '../settings/connection.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['serviceId'])) {
    $serviceId = $_POST['serviceId'];

    // SQL to delete a service
    $sql = "DELETE FROM servicerequests WHERE request_id = ?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $serviceId);
    
    // Execute and check if successful
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method or missing serviceId.']);
}
?>
