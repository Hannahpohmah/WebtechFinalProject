

<?php
session_start();
require_once('../settings/connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update the status of the service request with the given id
    $new_status= 'Accepted';
    $userID = $_SESSION['user_id'];
    
    $query = "UPDATE servicerequests SET status = ?, status_changed_by = ? WHERE request_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "sii",$new_status,$userID, $id);
    mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Status updated successfully!";
        header("location:../g_view/admin.php");
    } else {
        echo "Failed to update status.";
        header("location:../g_view/admin.php");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "Invalid request.";
    header("location:../g_view/admin.php");
}

?>
