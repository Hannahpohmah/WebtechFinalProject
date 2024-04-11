<?php
// Adjust this path as necessary



function getAllquestions() {
    global $conn;

    $sql = "SELECT* FROM questions";
    $result = $conn->query($sql);

    $questions = [];
    

    // Check if execution worked
    if (!$result ) {
        die("Error executing query: " . $conn->error);
    }

    // Check if any record was returned
    if ($result->num_rows > 0) {
        // Fetch records
        $questions = array();
        while ($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }

        return $questions;
    } else {
        return null;
    }
}

?>
