
<?php 

session_start();
include "../settings/core.php";
//Login_session();
  
//$UserID = $_SESSION['user_id'];
$UserName1 = $_SESSION['fname'];
$UserName2 = $_SESSION['lname'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="../g_css/setting_style.css"/>
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
              <img src="../g_img/logo.png" alt="" />
              <span id="name" class="nav-item">Home maintenance</span>
            </a>
          </li>
          <li>
            <a href="../g_view/admin.php">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a>
          </li>
          <li>
            <a href="maintenancePlans.php">
              <i class="fas fa-user"></i>
              <span class="nav-item">Maintenance Plans</span>
            </a>
          </li>
          <li>
            <a href="../g_view/manageservices.php">
              <i class="fas fa-tasks"></i>
              <span class="nav-item">service request</span>
            </a>
          </li>
          <li>
            <a href="../g_view/notification_page.php">
              <i class="fas fa-question-circle"></i>
              <span class="nav-item">Notifications</span>
            </a>
          </li>
          <li>
            <a href="../g_view/profile.php" class="settings">
              <i class="fas fa-cog"></i>
              <span class="nav-item">profile</span>
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
        <div class="circular-container">
          <img src="" alt="Your Image">
        </div>
        <div class="info">
            <h1> $UserName1 </h1>
            
        </div>
        <div class = "setting-list">
            <a href="../g_view/home_forgotten_password.php">Change Password </a>
        </div>

        <div class = "setting-list">
            <a id= "link-change-photo" onclick = "openModal()"> Change Profile Picture </a>
        </div>
        <div class="modal-change-picture">
            <div class="modal-content">
                <div class="circular-container">
                    <img src="../g_img/profile_2.jpeg" alt="Your Image">
                </div>
                <div class="option-change-picture">
                    <span class="close" onclick = "closeModal()">&times;</span>
                    <h2>Change Profile Picture</h2>
                    <input type="file" id="profile-picture-upload" accept="image/*">
                    <button id="upload-button">Upload</button>
                </div>
            </div>
        </div>

      </section>
    </div>
    <script src= "../g_js/change_picture_script.js"></script>
</body>
</html>
