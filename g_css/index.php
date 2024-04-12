<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Plans</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../g_css/editModal.css">
    <link rel="stylesheet" href="../g_css/plans.css">
    <link rel="stylesheet" href="../g_css/dash_style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Styling elements -->
</head>
<body>

<?php
//include '../settings/connection.php';
session_start();
include '../function/select_plan_fxn.php';

include '../function/select_category_fxn.php';

?>

<aside class="sidebar" id="sidebar">
    <!-- Navbar with logo, menu toggle, admin info, and settings -->
    <div class="navbar">
        <div class="logo">
            <h3> maintenance App</h3>
        </div>
    </div>
    
    <nav class="menu">
        <a href="../view/dash.php.php" class="nav-item" style="color: #ffffff;">Homepage</a>
        <a href="../view/addchore.php" class="nav-item" style="color: #ffffff;">Add Chores</a>
        <a href="../view/setting.php" class="nav-item" style="color: #ffffff;">Setting</a>
        <a href="../view/logout.php" class="nav-item" style="color: #ffffff;">Logout</a>
    </nav>
    <!-- Admin info, settings, and logout buttons -->
    <div class="admin-info">
        <!-- Add admin info here if needed -->
    </div>
</aside>

<div class="main-content">
    <!-- Section for displaying upcoming tasks and chore distribution -->
    <section class="upcoming-tasks">
        <h2>Maintenance Plan</h2>
        <button id="toggleChoreList" style="font-size: 14px; background: linear-gradient(40deg, #1e3443, #2c0b40); color: #ffffff;">See Active Plans</button>
        
        <?php include ('../function/get_managementplan_fxn.php');?>
    </section>

    <div class="backdrop" id="backdrop"></div>

    <!-- "Assign Chore" Button -->
    <div class="assign-chore-btn-container">
        <button id="assignChoreBtn" style="font-size: 14px; cursor: pointer; position: fixed; top: 75px; right: 20px; padding: 10px; background: linear-gradient(60deg, #1e3443, #2c0b44); color: #ffffff;" onclick="toggleAssignForm()">Add Plan</button>
    </div>

    <!-- Container for managing plans with add button and form popup -->
    <div id="addplan" class="container" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999; background-color: #d8b8ff; padding: 50px; margin-right; 80px; border-radius: 10px;">
        <span onclick="closeAssignForm()" class="close" title="Close Form">&times;</span>
        <h2>Add a plan</h2>
        <form action="../action/maintenance-action.php" method="post" name="addplanForm">

        <div style="display: flex; flex-direction: column;">
            <label for="planName" style="margin-bottom: 7px;">Plan Name</label>
            <select name="plan" id="plan" required style="margin-bottom: 20px;">
                <option value="">select plan</option>
                <?php foreach ($plans as $plan) : ?>
                    <option value="<?php echo $plan; ?>"><?php echo $plan; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="Startdate">Start Date:</label>
            <input type="date" name="startdate" id="startdate" required>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="End_date">End Date:</label>
            <input type="date" name="End_date" id="End_date" required>
        </div>

        <?php include ('../function/select_frequency_fxn.php');?>
        <div style="margin-bottom: 20px;">
            <label for="frequency">frequency:</label>
            <select name="frequency" id="frequency" required >
                <option value="">Select a frequency</option>
                <?php foreach ($frequency as $freqs) : ?>
                    <option value="<?php echo $freqs; ?>"><?php echo $freqs; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="category"> service:</label>
            <select name="servicerequired" id="servicerequired" required >
                <option value="">Select a service</option>
                <?php foreach ($categories as $freq) : ?>
                    <option value="<?php echo $freq; ?>"><?php echo $freq; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="details">Any additional Details:</label>
            <input type="text" name="details" id="details" required>
        </div>

        <button type="submit" name="submitplan" style="background: linear-gradient(60deg, #1e3443, #2c0b44); color: #ffffff;">Submit Plan</button>
        </div>
    </form>
</div>
<script>
        function toggleAssignForm() {
            var formPopup = document.getElementById('addplan');
            var backdrop = document.getElementById('backdrop');
            if (formPopup.style.display === 'block') {
                formPopup.style.display = 'none';
                backdrop.style.display = 'none';
            } else {
                formPopup.style.display = 'block';
                backdrop.style.display = 'block';
            }
        }

        function closeAssignForm() {
            var formPopup = document.getElementById('addplan');
            var backdrop = document.getElementById('backdrop');
            formPopup.style.display = 'none';
            backdrop.style.display = 'none';
        }
</script>

<!-- JavaScript code for toggling sidebar and form popup -->
<script src="script.js"></script>
<script>
    function toggleSidebar() {
        var navbar = document.querySelector('.navbar');
        if (navbar.style.width === '250px') {
            navbar.style.width = '0';
        } else {
            navbar.style.width = '250px';
        }
    }

    function toggleForm() {
        var formPopup = document.getElementById('addplanForm');
        formPopup.style.display = (formPopup.style.display === 'none' || formPopup.style.display === '') ? 'block' : 'none';
    }

    function closeForm() {
        document.getElementById('addplanForm').style.display = 'none';
    }

    function cancelPlan(planId) {
          if (confirm("Are you sure you want to delete this chore?")) {
              window.location.href = "../action/delete_plan.php?id=" + planId;
            }
        }
    function editplan(planId) {
          Swal.fire({
              title: 'Are you sure?',
              text: 'You are about to edit this chore.',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, edit it!'
          }).then((result) => {
              if (result.isConfirmed) {
                  // Redirect to the edit form
                  window.location.href = "../g_view/edit_chore_view.php?id=" + planId ;
              }
          });
      }

</script>
</body>
</html>


