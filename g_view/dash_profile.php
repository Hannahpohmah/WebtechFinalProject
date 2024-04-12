<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../g_css/dash_style.css" />
    <link rel="stylesheet" href="../g_css/profile_style.css" />

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
            <a href="../g_view/dash.php">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-user"></i>
              <span class="nav-item">Profile</span>
            </a>
          </li>
          <li>
            <a href="../g_view/manageAppointments.php">
              <i class="fas fa-tasks"></i>
              <span class="nav-item">Manage Appointemets</span>
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
        
        
        <div class="circular-container">
            <img src="../g_img/profile_2.jpeg" alt="Your Image">
          </div>

        <section class="main-task">
            <i class="fa fa-pen fa-xs edit"></i>
                <div class="profile_table">
                    <table>
                        <tbody>

                        <?php
                          require_once("../settings/connection.php");
                          session_start();
                            
                          $UserID = $_SESSION['user_id'];

                            function get_user($UserID){
                              global $conn;
                              $stmt = $conn->prepare("SELECT fname, lname, email, major, yeargroup FROM user WHERE UserID = ?");
                              $stmt->bind_param("i", $UserID);
                              $stmt->execute();
                              $result = $stmt->get_result();
                              $stmt->close();
                              return $result->fetch_assoc();
                            }
                                                                
                            require_once("../settings/connection.php");
                            
                            $user = get_user($UserID);

                            $conn->close();
                            
                            $fname = $user['fname'];
                            $lname = $user['lname'];
                            $email = $user['email'];
                            $major = $user['major'];
                            $yeargroup = $user['yeargroup'];
                            
                            if (!$user){
                                echo '<div>No user found</div>';
                                
                                $fname = '--';
                                $lname = '--';
                                $email = '--';
                                $major = '--';
                                $yeargroup = '--';
                            }

                          echo "<tr>
                              <td>Name</td>
                              <td>:</td>
                              <td>" . $fname. " " . $lname. "</td>
                          </tr>
                          <tr>
                              <td>Email</td>
                              <td>:</td>
                              <td>" . $email . "</td>
                          </tr>
                          <tr>
                              <td>Major</td>
                              <td>:</td>
                              <td>" . $major. "</td>
                          </tr>
                          <tr>
                              <td>Class</td>
                              <td>:</td>
                              <td>" . $yeargroup. "</td>
                          </tr>";
                            
                        ?>

                            
                        </tbody>
                    </table>
                </div>        
      </section>
    </div>
  </body>
</html>
