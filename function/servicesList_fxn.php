<?php
include '../action/get_admin_services.php';

// Execute the function to get all services
$services = getAllServices();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="../g_css/plans.css">
</head>
<body>
    <div class="container">
        <?php
        // Display the list of services in a table format
        if ($services) {
            foreach ($services as $service) {
                $date = date('j', strtotime($service['request_date']));
                $month = date('M', strtotime($service['request_date']));
                $time = date('h:i a', strtotime($service['request_date']));
                $timing = $service['preferred_timing'];
                $special_instructions = $service['special_instructions'];
                $requested_by = $service['user_id'];
                $status=  $service['status'];
        
                // Retrieve user details
                $query = "SELECT * FROM users WHERE user_id = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "i", $requested_by);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
        
                if ($result && $row = mysqli_fetch_assoc($result)) {
                    $fname = $row['fname']; // Assuming 'fname' is the column name for the user's first name
                    $address =$row['address'];
                    $phone_number =$row['phone_number'];


                    echo '<div class="timeline-container">';
                    echo '<div class="timeline-item completed">';
                    echo '<div class="timeline-content">';
                   
                    echo '<p>Address: ' .$address . '</p>';
                   
                    echo '<p>Details: ' .$special_instructions. '</p>';
                    echo '<p>Timing(hrs): ' .$timing . '</p>';
                    echo '<p>status: ' . $status . '</p>';
                    echo '<td class="action-buttons">';
                    echo '<button style="color: black;" onclick="AcceptService('.$service["request_id"].')"><i class="fas fa-edit" style="color: white;"></i></button>';
                    echo "</td>";
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
               }}
            
                } else {
            echo '<p>No services requested.</p>';
        }
        ?>
    </div>
</body>
</html>

