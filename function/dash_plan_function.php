<?php

include '../action/get_all_years.php';

$UserID = $_SESSION['user_id'];

$servicesByYear = getDashboardServices($UserID);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../g_css/dash_style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    
</head>
<body>
    <div class="container">
        <?php
        foreach ($servicesByYear as $year => $services) {
            echo "<section class='main-task'>";
            echo "<div class='event-container'>";
            echo "<h3 class='year'>$year</h3>";

            foreach ($services as $service) {
                $date = date('j', strtotime($service['request_date']));
                $month = date('M', strtotime($service['request_date']));
                $time = date('h:i a', strtotime($service['request_date']));
                $cid = $service['category_id'];
                $timing  = $service['preferred_timing'];
                $special_instructions = $service['special_instructions'];

                // Select the category name using a query
                $query = "SELECT category_name FROM servicecategories WHERE category_id = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "i", $cid);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if ($result && $category_row = mysqli_fetch_assoc($result)) {
                    $category = $category_row['category_name'];

                    echo "<div class='event'>";
                    echo "<div class='event-left'>";
                    echo "<div class='event-date'>";
                    echo "<div class='date'>$date</div>";
                    echo "<div class='month'>$month</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='event-right'>";
                    echo "<h3 class='event-title'>$category</h3>";
                    echo "<div class='event-description'>$special_instructions</div>";
                    echo "<div class='event-timing'>";
                    echo "<img src='images/time.png' alt='' /> Timing: " . $timing;
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "Error fetching category name.";
                }

                mysqli_stmt_close($stmt); // Close the prepared statement
            }

            echo "</div>"; // Close event-container div
            echo "</section>";
        }
        ?>

    </div>
</body>
</html>
