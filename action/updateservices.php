<?php
// Assuming you have a database connection set up
include '../settings/connection.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serviceId = $_POST['serviceId'];
    $timing = $_POST['timing'];
    $details = $_POST['details'];
    $emergency = $_POST['emergency'] == 'Yes' ? 1 : 0;

    // SQL to update a service
    $sql = "UPDATE servicerequests SET preferred_timing=?, special_instructions=?, emergency=? WHERE request_id=?";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $timing, $details, $emergency, $serviceId);
    
    // Execute and check if successful
    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $conn->error]);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
?>

