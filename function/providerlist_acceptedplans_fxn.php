<?php
require_once('../settings/connection.php');

include '../action/get_accepted_plans.php';

// Execute the function to get all services
$plans = getAllplans();


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
        if ($services) {
            echo '<style>' .
                'table {' .
                '    width: 100%;' .
                '    border-collapse: collapse;' .
                '    margin-top: 20px;' .
                '}' .
                'th, td {' .
                '    border: 1px solid #ddd;' .
                '    padding: 10px;' .
                '    text-align: left;' .
                '}' .
                'th {' .
                '    background-color: rgb(8, 43, 8); /* Blue color for header */' .
                '    color: rgb(148, 148, 11); /* White text color for header */' .
                '}' .
                'tr:hover {' .
                '    background-color: #f9f9f9;' .
                '}' .
                '.action-buttons button {' .
                '    padding: 5px 10px;' .
                '    margin-right: 5px;' .
                '    border: none;' .
                '    cursor: pointer;' .
                '    color: white;' .
                '    border-radius: 3px;' .
                '    transition: background-color 0.3s;' .
                '}' .
                '.action-buttons button:hover {' .
                '    background-color: #DA70D6;' .
                '}' .
                '.fa {' .
                '    margin-right: 5px;' .
                '}' .
                '</style>';
            echo '<table id="planTable" style="display: none;">' .
                '<tr>' .
                '<th>Requested By</th>' .
                '<th>Address</th>' .
                '<th>Phone number</th>' .
                '<th>startdate</th>' .
                '<th>enddate</th>' .
                '<th>frequency</th>' .
                '<th>details</th>' .
                '<th>Status</th>' .
                '<th>Actions</th>' .
                '</tr>';
            foreach ($plans as $plan) {
                $startdate = htmlspecialchars($plan['start_date']);
                $enddate = htmlspecialchars($plan['end_date']);
                $frequency = htmlspecialchars($plan['frequency']);
                $details = htmlspecialchars($plan['Details']);
                $status = htmlspecialchars($plan['status']);

                // Retrieve user details
                $requested_by = $plan['user_id'];
                $query = "SELECT * FROM users WHERE user_id = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "i", $requested_by);
                mysqli_stmt_execute($stmt);
                $result1 = mysqli_stmt_get_result($stmt);

                $frequency = htmlspecialchars($plan['frequency']);
                $query = "SELECT frequency_name FROM frequency WHERE id = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "i", $frequency);
                mysqli_stmt_execute($stmt);
                $result2 = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result2);
                $freq_name = htmlspecialchars($row['frequency_name']);
                

                if ($result1 && $row = mysqli_fetch_assoc($result1)) {
                    $fname = htmlspecialchars($row['fname']); // Assuming 'fname' is the column name for the user's first name
                    $address = htmlspecialchars($row['address']);
                    $phone_number = htmlspecialchars($row['phone_number']);
                }
               

                echo "<tr>";
                echo "<td>" . $fname . "</td>";
                echo "<td>" . $address . "</td>";
                echo "<td>" . $phone_number . "</td>";
                echo "<td>" . $startdate . "</td>";
                echo "<td>" .  $enddate. "</td>";
                echo "<td>" .  $freq_name. "</td>";
                echo "<td>" .  $details. "</td>";
                echo "<td>" . $status . "</td>";
                echo '<td class="action-buttons">';
                echo '<button style="color: black;" onclick="editstatus(' . $plan["plan_id"] . ')"><i class="fas fa-edit" style="color: green;"></i></button>';
                echo "</td>";
                echo "</tr>";
            }

            echo "</table>";
        }
        ?>
    </div>
</body>
</html>
