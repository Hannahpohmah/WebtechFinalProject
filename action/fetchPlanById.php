
<?php 
include '../settings/connection.php';

function getPlanById($id) {
    global $conn;
    $query = "SELECT * FROM homemaintenanceplans WHERE plan_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $plan = $result->fetch_assoc();
        $stmt->close();
        return $plan;
    } else {
        $stmt->close();
        return null;
    }
}
?>
