<?php
include ('../settings/connection.php');

// Select query to fetch categories
$sql = "SELECT category_name FROM servicecategories";

// Execute the query
$result = $conn->query($sql);

// Check if execution worked
if ($result === false) {
    die("Error executing the query: " . $conn->error);
}

// Fetch the results
$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row['category_name'];
}

// Close the connection
$conn->close();
return $categories;
// Return the categories as a JSON object
//echo json_encode($categories);
?>
