<?php
// Include your database connection code here
// Assuming $conn is your database connection
session_start();
include '../settings/core.php'; 
include('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $planName = $_POST['plan'];
    $startDate = $_POST['startdate'];
    $details = $_POST['details'];
    $category = $_POST['servicerequired'];
    $endDate = $_POST['End_date'];
    $frequency = $_POST['frequency'];

    $stmt = $conn->prepare("SELECT id FROM plan WHERE planName = ?");
    $stmt->bind_param("s", $planName);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $pid = $row['id'];

    // Retrieve the frequency ID based on the frequency name
    $stmt = $conn->prepare("SELECT id FROM frequency WHERE frequency_name = ?");
    $stmt->bind_param("s", $frequency);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $frequencyId = $row['id'];

    $sqlCategory = "SELECT category_id FROM servicecategories WHERE category_name = ?";
    $stmtCategory = $conn->prepare($sqlCategory);
    $stmtCategory->bind_param("s", $category);
    $stmtCategory->execute();
    $resultCategory = $stmtCategory->get_result();
    $rowCategory = $resultCategory->fetch_assoc();
    $category_id = $rowCategory['category_id'];

    $stmt = $conn->prepare("INSERT INTO homemaintenanceplans (user_id, pid, start_date, end_date, frequency, Details,cid) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissisi",  $user_id, $pid, $startDate, $endDate, $frequencyId, $details,$category_id);
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        echo '<script>
            alert("maintenancePlan successfully created.");
            setTimeout(function() {
                window.location.href = "../g_view/maintenancePlans.php";
            }, 100); // Delay in milliseconds
          </script>'; 
}
    } else {
        echo "Failed to add plan.";
    }

    // Close the statement
    $stmt->close();


// Close the database connection
$conn->close();
?>
