<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../g_css/dash_style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <style>
      .upcoming-tasks {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0px;
        max-height: 350px;
        }

      .upcoming-tasks th, .upcoming-tasks td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        }

      .card {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgb(8, 43, 8);
        padding: 20px;
        margin: 0 10px;
        flex: 1 0 30%; /* Flex-grow: 1, Flex-shrink: 0, Flex-basis: 30% */
        max-width: 30%; /* Limit the width to 30% of the container */
        text-align: center;
        border: 3px solid;
        margin-bottom: 20px;
        height: 90px;
        display: flex;
        flex-direction: column; /* Align content vertically */
        justify-content: center; /* Align content horizontally */
    }
      .card:hover {
        background-color: rgb(148, 148, 11); /* Yellow on hover */
}

      .dashboard {
        display: flex;
        flex-wrap: wrap; /* Allow cards to wrap to the next line */
        justify-content: space-between; /* Distribute space between cards */
        padding: 20px;
        margin-bottom: 0px;
    }

      #completion-rate-card { border-color: #3498db; } 
      #average-time-card { border-color: #e74c3c; } 
      #top-users-card { border-color: #2ecc71; } 
      #another-card {
        border-color: #f39c12; /* Orange */
      }

      #yet-another-card {
        border-color: #9b59b6; /* Purple */
      }

      #final-card {
        border-color: #1abc9c; /* Turquoise */
      }


      .card h3 { margin-bottom: 0px; }
      .card .stat {
            font-size: 24px;
            font-weight: bold;
            margin: 0px 0;
        }
      .highlight { font-weight: bold; }  
      
      </style>
  </head>
  <body>
    <div class="container">
      <nav>
        <ul>
          <li>
            <a href="#" class="logo">
              <img src="../g_img/logo.png" alt="" />
              <span id="name" class="nav-item">Home Maintenance</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a>
          </li>
          <li>
            <a href="../g_view/maintenancePlans.php">
              <i class="fas fa-user"></i>
              <span class="nav-item">Maintenance plans </span>
            </a>
          </li>
          <li>
            <a href="../g_view/manageservices.php">
              <i class="fas fa-tasks"></i>
              <span class="nav-item">Service Request</span>
            </a>
          </li>
          <li>
            <a href="../g_view/notification_page.php" >
              <i class="fas fa-question-circle"></i>
              <span class="nav-item">Notifications</span>
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
          <section class="upcoming-tasks">
                <h2>categories</h2>
                <div class="dashboard">
                    
                    <div class="card" id="completion-rate-card" onclick="showDescription('Service 1 Description')">
                        <h3>Plumbering</h3>
                    </div>
                        
                    <div class="card" id="average-time-card" onclick="showDescription('Service 2 Description')">
                        <h3>Electrical</h3>
                    </div>
                         
                    <div class="card" id="top-users-card" onclick="showDescription('Service 3 Description')">
                        <h3>Appliance Repair</h3>
                    </div>
                    <div class="card" id="another-card" onclick="showDescription('Service 4 Description')">
                        <h3>Carpentary </h3>
                    </div>
                    <div class="card" id="yet-another-card" onclick="showDescription('Service 5 Description')">
                        <h3>Security systems</h3>
                    </div>
                    <div class="card" id="final-card" onclick="showDescription('Service 6 Description')">
                        <h3>Home renovation</h3>
                    </div>
                </div>
                
            </section>
          <h1>Maintenance History</h1>
          <?php include '../function/dash_plan_function.php';?>
        </section> 
      </section>
    </div>
    <script>
      function showDescription(description) {
          Swal.fire({
              text: description,
              showConfirmButton: false,
              background: 'rgba(0, 0, 0, 0.8)'
          });
    }
    </script>
      <div class="assign-chore-btn-container">
            <button id="assignChoreBtn" style="font-size: 14px; cursor: pointer; position:fixed; top: 50px; right: 20px; padding: 10px; background:  rgb(148, 148, 11); color: #ffffff;" onclick="../g_view/viewprovider">view Providers</button>
        </div>

  </body>
</html>
