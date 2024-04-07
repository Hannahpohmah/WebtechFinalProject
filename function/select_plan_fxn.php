<?php
include ('../settings/connection.php');

// Select query to fetch categories
$sql = "SELECT planName FROM plan";

// Execute the query
$result = $conn->query($sql);

// Check if execution worked
if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

// Fetch the results
$plans = [];
while ($row = $result->fetch_assoc()) {
    $plans [] = $row['planName'];
}

// Close the connection
$conn->close();

// Return the categories as a JSON object
//echo json_encode($categories);
?>