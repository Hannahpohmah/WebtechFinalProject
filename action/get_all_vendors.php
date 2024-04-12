<?php
require_once('../settings/connection.php');

function getAllVendors() {
    global $conn;

    $query = "SELECT * FROM users WHERE roleId=3";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error retrieving vendors: " . mysqli_error($conn));
    }

    $vendors = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $vendors[] = $row;
    }

    return $vendors;
}

?>
