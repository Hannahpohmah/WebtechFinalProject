<?php
include '../action/get_all_services.php';

$UserID = $_SESSION['user_id'];


$services = getServicesById($UserID);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../g_css/editModal.css">
</head>
<body>

    <table style="width: 100%;">
        <tr>
            <th>category</th>
            <th>request Date</th>
            <th>Timing(hrs)</th>
            <th>Details</th>
            <th>Emergency</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php foreach ($services as $service) : ?>
            <?php
            $cid = $service["category_id"];
            $status = $service["status_changed_by"];

            // Fetch category name
            $query = "SELECT category_name FROM servicecategories WHERE category_id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "i", $cid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result && $category_row = mysqli_fetch_assoc($result)) {
                $category = $category_row['category_name'];
            } else {
                $category = []; // Default category name if not found
            }

            // Fetch user information for status_changed_by
            $query = "SELECT * FROM users WHERE user_id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "i", $status);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && $name_row = mysqli_fetch_assoc($result)) {
                $infos = $name_row;
            } else {
                $infos = []; // Default user information if not found
            }
            ?>
            <tr>
                <td><?= $category ?></td>
                <td><?= $service["request_date"] ?></td>
                <td><?= $service["preferred_timing"] ?></td>
                <td style="max-width: 150px; word-wrap: break-word;"><?= $service["special_instructions"] ?></td>
                <td><?= $service["emergency"] == 1 ? 'Yes' : 'No' ?></td>
                <td onclick="showDescription('<?php echo $infos ? htmlspecialchars($infos['fname']) : ''; ?>', '<?php echo $infos ? htmlspecialchars($infos['lname']) : ''; ?>', '<?php echo $infos ? htmlspecialchars($infos['address']) : ''; ?>', '<?php echo $infos ? htmlspecialchars($infos['phone_number']) : ''; ?>')"><?= $service["status"] ?></td>
                <td>
                    <button onclick="editservice(<?= $service['request_id'] ?>)">Edit</button>
                    <button onclick="deleteservice(<?= $service['request_id'] ?>)">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <h2>Edit Appointment</h2>
            <form id="editAppointmentForm">
                <input type="hidden" id="editserviceId">
                

                <label for="editpreferred_timing">Preferred Timing (hours):</label>
                <input type="number" name="preferred_timing" id="editpreferred_timing" min="1" required><br><br>


                <label for="editspecial_instructions">Special Instructions</label>
                <textarea name="special_instructions" id="editspecial_instructions" cols="30" rows="3"></textarea><br><br>

                <label for="editemergency">Is this an emergency service?</label>
                <input type="checkbox" name="emergency" id="editemergency"><br><br>

                <button type="button" onclick="updateservices()">Save Changes</button>
            </form>
        </div>
    </div>

    <script>
        // Define the function to open the modal and populate it with data
        function editservice(requestId) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../function/fetchservice.php?request_id=' + requestId, true);
            xhr.onload = function() {
                if (this.status == 200) {
                    try {
                        var service = JSON.parse(this.responseText);
                        console.log(service);
                        document.getElementById("editserviceId").value = requestId;
                        document.getElementById("editpreferred_timing").value = service.preferred_timing;
                        document.getElementById("editspecial_instructions").value = service.special_instructions;
                        document.getElementById("editemergency").checked = (service.emergency == 1);
                        document.getElementById("editModal").style.display = "block";
                    } catch (e) {
                        alert('Error parsing service details.');
                    }
                } else {
                    alert('Failed to fetch service details.');
                }
            };
            xhr.onerror = function() {
                alert('Request failed.');
            };
            xhr.send();
        }

        // Define the function to close the modal
        function closeModal() {
            document.getElementById("editModal").style.display = "none";
        }

        // Define the function to update the service
        function updateservices() {
            var serviceId = document.getElementById("editserviceId").value;
            var timing = document.getElementById("editpreferred_timing").value;
            var details = document.getElementById("editspecial_instructions").value;
            var emergency = document.getElementById("editemergency").checked ? 'Yes' : 'No';

            var formData = new FormData();
            formData.append("serviceId", serviceId);
            formData.append("timing", timing);
            formData.append("details", details);
            formData.append("emergency", emergency);

            var xhr = new XMLHttpRequest();

            xhr.open("POST", "../action/updateservices.php", true);
            xhr.onload = function() {
                if (this.status == 200) {
                    console.log(xhr.responseText);
                    var response = JSON.parse(this.responseText);
                    if (response.success) {
                        //  alert("service updated successfully.");
                        closeModal();
                        location.reload();

                        // Optionally refresh the services list here
                    } else {
                        alert("Failed to update service.");
                    }
                } else {
                    alert("Failed to send request.");
                }
            };
            xhr.send(formData);
        }

        // Event listeners for modal close actions
        document.getElementsByClassName("close-button")[0].onclick = closeModal;
        window.onclick = function(event) {
            if (event.target == document.getElementById("editModal")) {
                closeModal();
            }
        };

        function deleteservice(requestId) {
            if (confirm('Are you sure you want to delete this service?')) {
                
                var serviceId = document.getElementById("editserviceId").value;
                var formData = new FormData();
                formData.append("serviceId", serviceId);


                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../action/deleteservice.php", true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (this.status == 200) {
                        var response = JSON.parse(this.responseText);
                        if (response.success) {
                            alert("Service deleted successfully.");
                            location.reload(); // Reload the page to reflect the changes
                        } else {
                            alert("Failed to delete service.");
                        }
                    } else {
                        alert("Failed to send request.");
                    }
                };
                xhr.send("serviceId=" + requestId);
    }
}       
        function showDescription(fname, lname, address, phoneNumber) {
            Swal.fire({
                html: '<div>' +
                    '<strong>First Name:</strong> ' + fname + '<br>' +
                    '<strong>Last Name:</strong> ' + lname + '<br>' +
                    '<strong>Address:</strong> ' + address + '<br>' +
                    '<strong>Phone Number:</strong> ' + phoneNumber + '<br>' +
                    '</div>',
                background: 'rgb(8, 43, 8)', 
                showConfirmButton: false,
                background: 'rgba(0, 0, 0, 2)'
            });
        }



    </script>

</body>

</html>
