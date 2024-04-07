<?php
include '../settings/connection.php';
// session_start();
function getservicesById($UserID) {
    global $conn;
    
    $sql = "SELECT * FROM servicerequests where user_id = $UserID";

    // Execute the query
    $result = $conn->query($sql);
    

    // Check if execution worked
    if (!$result ) {
        die("Error executing query: " . $conn->error);
    }

    // Check if any record was returned
    if ($result->num_rows > 0) {
        // Fetch records
        $byid = array();
        while ($row = $result->fetch_assoc()) {
            $byid[] = $row;
        }

        return $byid;
    } else {
        return null;
    }
}
?>

