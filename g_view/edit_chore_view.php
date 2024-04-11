<!--edit_chore_view.php 
// this page is used to edit a chore   -->
<?php
    include '../settings/core.php'; 
    include '../action/fetchPlanById.php';
   

    if(isset($_GET['id'])) {
        $planId = $_GET['id'];
        // Call the function from fetchPlanById.php to retrieve the plan
        $plan = getPlanById($planId);

        // Check if the plan was found
        if($plan) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Plan</title>
    <!-- Add SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function validateForm() {
            var planName = document.getElementById("editPlanName").value;
            var details = document.getElementById("details").value;
            var frequency = document.getElementById("editfreq").value;
            // Check if plan name only contains letters
            if (!/^[a-zA-Z\s]+$/.test(details)) {
                Swal.showValidationMessage('details must contain only letters.');
                return false;
            }

            return true;
        }

        function submitForm() {
            if (validateForm()) {
                document.getElementById('editPlanForm').submit();
            }
        }

        function editplan() {
            Swal.fire({
                html: `
                    <div id="editPlanModal" class="" style="display: block;">
                        <div class="modal-content">
                            <span class="close-button">&times;</span>
                            <h2>Edit Plan</h2>
                            '<form id="editPlanForm" action=../action/updateplan.php method="post" onsubmit="return false;">'
                                <input type="hidden" name="planId" value="<?php echo $planId; ?>">' 
                                <label for="editPlanName">Plan Name:</label>
                                <select name="plan" id="editPlanName" required style="margin-bottom: 20px;">
                                    <option value="">select plan</option>
                                    <?php include ('../function/select_plan_fxn.php');?>
                                    <?php foreach ($plans as $plan) : ?>
                                        <option value="<?php echo $plan; ?>"><?php echo $plan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div style="margin-bottom: 20px;">
                                    <label for="details">Any additional Details:</label>
                                    <input type="text" name="details" id="details" >
                                </div>
                                <input type="hidden" id="editfreq">
                                <label for="editfreq">frequency:</label>
                                <select name="frequency" id="editfreq" style="margin-bottom: 20px;">
                                <option value="">Select a frequency</option>
                        
                                <?php include ('../function/select_frequency_fxn.php');?>
                                    <?php foreach ($frequency as $freq) : ?>
                                        <option value="<?php echo $freq; ?>"><?php echo $freq; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                            
                            </div>
                        </div>
                    `,
                showCancelButton: true,
                confirmButtonText: 'Save',
                cancelButtonText: 'Cancel',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    submitForm();
                },
                allowOutsideClick: () => !Swal.isLoading()
            });
        }
        editplan();
    </script> 

</body>
</html>
<?php
        } else {
            // Plan not found, redirect to plan_control_view.php
            header("Location: ../g_view/maintenancePlans.php");
            exit();
        }
    } else {
        // Plan ID not set, redirect to plan_control_view.php
        header("Location: ../g_view/maintenancePlans.php");
        exit();
    }
    ?>