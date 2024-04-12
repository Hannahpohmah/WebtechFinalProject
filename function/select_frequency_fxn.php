<?php
include ('../settings/connection.php');

// Select query to fetch categories
$sql = "SELECT frequency_name FROM frequency";

// Execute the query
$result = $conn->query($sql);

// Check if execution worked
if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

// Fetch the results
$frequency = [];
while ($row = $result->fetch_assoc()) {
    $frequency[] = $row['frequency_name'];
}
// Close the connection
$conn->close();
return $frequency;


