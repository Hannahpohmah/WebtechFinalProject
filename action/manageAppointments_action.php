<?php

session_start();
include '../settings/core.php'; 


include('../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you already have $user_id from somewhere (e.g., session, form)
    $user_id = $_SESSION['user_id'];

    $request_date = $_POST['request_date'];
    $category = $_POST['category'];
    
    $preferred_timing = $_POST['preferred_timing'];
    $special_instructions = $_POST['special_instructions'];
    $emergency = isset($_POST['emergency']) ? 1 : 0;
    
    // Prevent bookings in the past
    $currentDateTime = new DateTime();
    $requestDateTime = new DateTime($request_date); 

    if ($requestDateTime < $currentDateTime) {
        echo '<script>
            alert("Bookings cannot be made in the past.");
            setTimeout(function() {
                window.location.href = "../g_view/manageservices.php";
            }, 100); // Delay in milliseconds
          </script>';
        exit();
    }

    // Fetch category_id
    $sqlCategory = "SELECT category_id FROM servicecategories WHERE category_name = ?";
    $stmtCategory = $conn->prepare($sqlCategory);
    $stmtCategory->bind_param("s", $category);
    $stmtCategory->execute();
    $resultCategory = $stmtCategory->get_result();
    $rowCategory = $resultCategory->fetch_assoc();
    $category_id = $rowCategory['category_id'];

    $sqlAddress = "SELECT address, phone_number FROM users WHERE user_id = ?";
    $stmtAddress = $conn->prepare($sqlAddress);
    $stmtAddress->bind_param("i", $user_id);
    $stmtAddress->execute();
    $resultAddress = $stmtAddress->get_result();
    $rowAddress = $resultAddress->fetch_assoc();
    $address = $rowAddress['address'];
    $phone_number = $rowAddress['phone_number'];

    // Insert into servicerequest table
    $sql = "INSERT INTO servicerequests (category_id, user_id, request_date, preferred_timing, special_instructions, emergency, address, phone_number) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisissis", $category_id, $user_id, $request_date, $preferred_timing, $special_instructions, $emergency, $address, $phone_number);
    $stmt->execute();
    $stmt->close();
    echo '<script>
            alert("Service request successfully submitted.");
            setTimeout(function() {
                window.location.href = "../g_view/manageservices.php";
            }, 100); // Delay in milliseconds
          </script>'; 
}

$conn->close();

?>
