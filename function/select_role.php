<?php
include ('../settings/connection.php');

// Select query to fetch categories
$sql = "SELECT role_name FROM roles";

// Execute the query
$result = $conn->query($sql);

// Check if execution worked
if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

// Fetch the results
$roless = [];
while ($row = $result->fetch_assoc()) {
    $roles [] = $row['role_name'];
}

// Close the connection


// Return the categories as a JSON object
//echo json_encode($categories);
?>