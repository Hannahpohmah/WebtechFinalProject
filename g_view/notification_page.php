

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../g_css/notification_page_style.css" />
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
            <a href="#" class="logo">
              <img src="../g_img/bbg_logo.jpeg" alt="" />
              <span id="name" class="nav-item">HealthLine</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a>
          </li>
          <li>
            <a href="../g_view/dash_profile.php">
              <i class="fas fa-user"></i>
              <span class="nav-item">Profile</span>
            </a>
          </li>
          <li>
            <a href="../g_view/appointmentList.php">
              <i class="fas fa-tasks"></i>
              <span class="nav-item">Appointment List</span>
            </a>
          </li>
          <li>
            <a href="" >
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
            <a href="../g_view/dash_help.php" class="help">
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
        
        <section class="main-task">
        <h1>Notifications</h1>
                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Notification ID</th>
                                <th>Notification Type</th>
                                <th>Message</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody id="notificationTableBody">
                            <!-- Table rows will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
        </section> 
      </section>
    </div>
    <style>

    </style>
  </body>
</html>
