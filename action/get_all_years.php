<?php
include '../settings/connection.php';

function getAllYears() {
    global $conn;

    $query = "SELECT DISTINCT YEAR(request_date) AS request_year FROM servicerequests";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error executing query: " . mysqli_error($conn));
    }

    $years = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $years[] = $row['request_year'];
    }
    return $years;
}

function getDashboardServices($userId) {
    global $conn;

    $years = getAllYears();

    $service = [];
    foreach ($years as $year) {
        $query = "SELECT * FROM servicerequests WHERE YEAR(request_date) = ? AND user_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ii", $year, $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            die("Error executing query: " . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $service[$year][] = $row;
        }
    }

    return $service;
}
?>



