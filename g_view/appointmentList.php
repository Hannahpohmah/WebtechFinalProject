<?php include('../action/fetchAppointmentStats.php');
session_start();
include "../settings/core.php";
Login_session();
  
$UserID = $_SESSION['user_id'];
$UserName1 = $_SESSION['fname'];
$UserName2 = $_SESSION['lname'];



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../g_css/dash_style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
  </head>
  <body>
    <div class="container">
      <nav>
        <ul>
          <li>
            <a href="home.php" class="logo">
              <img src="../g_img/bbg_logo.jpeg" alt="" />
              <span id="name" class="nav-item">HealthLine</span>
            </a>
          </li>
          <li>
            <a href="../g_view/admin.php">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a>
          </li>
          <li>
            <a href="../g_view/profile.php">
              <i class="fas fa-user"></i>
              <span class="nav-item">Profile</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-tasks"></i>
              <span class="nav-item">Appointment List</span>
            </a>
          </li>
          <li>
            <a href="../g_view/notification_page.php" >
              <i class="fas fa-question-circle"></i>
              <span class="nav-item">Notification</span>
            </a>
          </li>
          <li>
            <a href="../g_view/setting.php" class="settings">
              <i class="fas fa-cog"></i>
              <span class="nav-item">Settings</span>
            </a>
          </li>
          <li>
            <a href="../g_view/admi_help.php" class="help">
              <i class="fas fa-question-circle"></i>
              <span class="nav-item">Help</span>
            </a>
          </li>
          <li>
            <a href="../g_view/home.php" class="logout">
              <i class="fas fa-sign-out-alt"></i>
              <span class="nav-item">Log out</span>
            </a>
          </li>
        </ul>
      </nav>

      
      <section class="main">
        <div class="main-top">
          <h1>DASHBOARD</h1>
          <i class="fas fa-user-cog"><?php echo $UserName1;?> <?php echo $UserName2;?></i>
        </div>
          <h1>Schedule Statistics</h1>
          <div class="main-skills">
            <a href="managechores.php" class="card">
                <i class="fas fa-clock"></i>
                <h3>Appointments</h3>
                <p id="totalAppointments"><?php echo $totalAppointments; ?></p>
            </a>
            <a href="managechores.php" class="card">
                <i class="fas fa-exclamation"></i>
                <h3>Cancelled</h3>
                <p id="cancelledAppointments"><?php echo $cancelledAppointments; ?></p>
            </a>
            <a href="managechores.php" class="card">
                <i class="fas fa-check"></i>
                <h3>Completed</h3>
                <p id="completedAppointments"><?php echo $completedAppointments; ?></p>
            </a>
        </div>
        <section class="main-task">
          <h1>Upcoming Appointments</h1>
          <div class="task-box">
              <div class="table-container">
                
                <?php include '../function/appointment_fxn.php';?>
          </div>
              </div>            
        </div>
        </div>
      </section>
    </div>
  </body>
</html>
