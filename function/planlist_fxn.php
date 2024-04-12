<?php
// Include the function file
include ('../action/get_admin_plans.php');

$var_data = getAllplans();

// Display the list of chore assignments
if ($var_data) {      
    foreach ($var_data as $plan) {
        // Prepare and execute the queries to get the plan name, frequency name, and category name
        $stmt1 = $conn->prepare("SELECT planName FROM plan WHERE id = ?");
        $stmt1->bind_param("i", $plan['pid']);
        $stmt1->execute();            
        $result_planName = $stmt1->get_result();
        $planName_row = $result_planName->fetch_assoc();
        $planName = $planName_row['planName'];

        $stmt2 = $conn->prepare("SELECT frequency_name FROM frequency WHERE id = ?");
        $stmt2->bind_param("i", $plan['frequency']);
        $stmt2->execute();
        $result_freqname = $stmt2->get_result();
        $freqname_row = $result_freqname->fetch_assoc();
        $frequency = $freqname_row['frequency_name'];

        $stmt3 = $conn->prepare("SELECT category_name FROM servicecategories WHERE category_id = ?");
        $stmt3->bind_param("i", $plan['cid']);
        $stmt3->execute();
        $result_catname = $stmt3->get_result();
        $catname_row = $result_catname->fetch_assoc();
        $category = $catname_row['category_name'];

        // Display the plan details
        
        echo '<div class="timeline-container">';
        echo '<div class="timeline-item completed">';
        echo '<div class="timeline-content">';
        echo '<p>Start Date: ' .$plan['start_date']  . '</p>';
        echo '<p>end date : ' .  $plan['end_date']. '</p>';
        echo '<p>frequenccy: ' . $frequency. '</p>';
        echo '<p>Details: ' .$plan['Details']  . '</p>';
        echo '<p>status: ' .$plan['status']  . '</p>';
        echo '<td class="action-buttons">';
        echo '<button style="color: black;" onclick="editplan('.$plan['plan_id'].')"><i class="fas fa-edit" style="color: white;"></i>Accept</button>';
        echo "</td>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        //echo '</div>'; // Check if this closing tag is necessary
    }
    
}
else {
    echo 'No Upcoming plan';
}
?>

