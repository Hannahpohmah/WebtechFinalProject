<?php
require_once('../settings/connection.php');

function getAllCategories() {
    global $conn;
    $query = "SELECT * FROM servicecategories";
    $result = mysqli_query($conn, $query);
    $categories = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
    return $categories;
}
?>
