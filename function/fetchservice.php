<?php
require_once('../settings/connection.php');

if(isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];
    
    $query = $conn->prepare("SELECT * FROM servicerequests WHERE request_id = ?");
    $query->bind_param("i", $request_id );
    if ($query->execute()) {
        $result = $query->get_result();
        if($row = $result->fetch_assoc()) {
            // Convert the emergency field to boolean
            $row["emergency"] = $row["emergency"] == 1 ? 'Yes' : 'No';
            echo json_encode($row); 
        } else {
            echo json_encode(['error' => 'Request not found.']);
        }
    } else {
        echo json_encode(['error' => 'Failed to execute query.']);
    }
    $conn->close();
} else {
    echo json_encode(['error' => 'No request ID provided.']);
}
?>

