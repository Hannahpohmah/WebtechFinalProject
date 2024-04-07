<!-- 
  <?php 
  //include('../action/fetchAppointmentStats.php'); 
//session_start();
//include "../settings/core.php";
//Login_session();
  
//$UserID = $_SESSION['user_id'];
//$UserName1 = $_SESSION['fname'];
//$UserName2 = $_SESSION['lname'];

?>
-->


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../g_css/dash_style.css" />
    <link rel="stylesheet" href="../g_css/admin_style.css" />
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
              <span id="name" class="nav-item">Home Maintenance</span>
            </a>
          </li>
          <li>
            <a href="admin.php">
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
            <a href="../g_view/appointmentList.php">
              <i class="fas fa-tasks"></i>
              <span class="nav-item">Available requests</span>
            </a>
          </li>
          <li>
            <a href="../g_view/notification_page.php">
              <i class="fas fa-question-circle"></i>
              <span class="nav-item">Maintenance plans</span>
            </a>
          </li>
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
            <div id="container">
                <div id="header">
                  <div id="monthDisplay"></div>
                  <div>
                    <button id="backButton">Back</button>
                    <button id="nextButton">Next</button>
                  </div>
                </div>
          
                <div id="weekdays">
                  <div>Sunday</div>
                  <div>Monday</div>
                  <div>Tuesday</div>
                  <div>Wednesday</div>
                  <div>Thursday</div>
                  <div>Friday</div>
                  <div>Saturday</div>
                </div>
          
                <div id="calendar"></div>
              </div>
        
              <!-- <div id="newEventModal">
                <h2>New Event</h2>
          
                <input id="eventTitleInput" placeholder="Event Title" />
          
                <button id="saveButton">Save</button>
                <button id="cancelButton">Cancel</button>
              </div>
          
              <div id="deleteEventModal">
                <h2>Event</h2>
          
                <p id="eventText"></p>
          
                <button id="deleteButton">Delete</button>
                <button id="closeButton">Close</button>
              </div>
          
              <div id="modalBackDrop"></div> -->
        </section>

    <script src="../g_js/admin_script.js"></script>
    
  </body>

  
</html>
