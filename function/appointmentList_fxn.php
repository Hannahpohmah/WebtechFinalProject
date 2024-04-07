<?php
// session_start();
include '../action/get_all_appointments.php';
$roleID = $_SESSION['role_id'];
$roleID = $_SESSION['UserID'];


// Execute the function to get all chores
$appointments = getAllappointment();

if ($roleID != 1) {
     $appointments = getAppointmentById($UserID);
}

// Display the list of chores in a table format
if ($appointments) {
    echo '<style>'.
         'table {'.
         '    width: 100%;'.
         '    border-collapse: collapse;'.
         '    margin-top: 20px;'.
         '}'.
         'th, td {'.
         '    border: 1px solid #ddd;'.
         '    padding: 10px;'.
         '    text-align: left;'.
         '}'.
         'th {'.
         '    background-color: #800080; /* Blue color for header */'.
         '    color: black; /* White text color for header */'.
         '}'.
         'tr:hover {'.
         '    background-color: #f9f9f9;'.
         '}'.
         '.action-buttons button {'.
         '    padding: 5px 10px;'.
         '    margin-right: 5px;'.
         '    border: none;'.
         '    cursor: pointer;'.
         '    color: white;'.
         '    border-radius: 3px;'.
         '    transition: background-color 0.3s;'.
         '}'.
         '.action-buttons button:hover {'.
         '    background-color: #DA70D6;'.
         '}'.
         '.fa {'.
         '    margin-right: 5px;'.
         '}'.
         '</style>';
    echo '<table>'.
         '<tr>'.
         '<th><i class="fas fa-clipboard"></i>Appointment date</th>'.
         '<th><i class="fas fa-user"></i>Attendee</th>'.
         '<th><i class="fas fa-calendar-day"></i>Case description</th>'.
         '<th><i class="fas fa-clock"></i>Time</th>'.
         '</tr>';
    foreach ($appointments as $appointment) {
        echo '<tr>'.
             '<td>'.$appointment["appointment_date"].'</td>'.
             '<td>'.$appointment["parient_id"].'</td>'.
             '<td>'.$appointment["problemDescription"].'</td>'.
             '<td>'.$appointment["appointment_time"].'</td>'.
             '<td class="action-buttons">'.
             '<button style="color: black;" onclick="cancelappointment('.$appointment["appointment_id"].')"><i class="fas fa-trash-alt" style="color: purple;"></i>Delete</button>'.
             '</td>'.
             '</tr>';
        }

        echo '</table>';
} else {
     echo '<table>'.
     '<tr>'.
     '<th><i class="fas fa-clipboard"></i>Appointment date</th>'.
     '<th><i class="fas fa-user"></i>Attendee</th>'.
     '<th><i class="fas fa-calendar-day"></i>Case description</th>'.
     '<th><i class="fas fa-clock"></i>Time</th>'.
     '</tr>';
}
?>
