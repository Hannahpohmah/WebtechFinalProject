<?php 

session_start();
include "../settings/core.php";
require_once('../action/get_all_categories.php');

$categories=getAllCategories();

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

      .event-container .event {
          box-shadow: 0 4px 16px -8px rgba(0, 0, 0, 0.4);
          display: flex;
          border-radius: 8px;
          margin: 32px 0 60px 0; /* Adjust the margin to increase vertical space */
      }

      .event .event-left {
        background: #64212f;
        min-width: 82px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #eee;
        padding: 8px 48px;
        font-weight: bold;
        text-align: center;
        border-radius: 8px 0 0 8px;
      }
      
      .event .event-left .date {
        font-size: 56px;
      }
      
      .event .event-left .month {
        font-size: 16px;
        font-weight: normal;
      }
      
      .event .event-right {
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 0 24px;
      }
      
      .event .event-right h3.event-title {
        
      }
      
      .event .event-right .event-timing {
        background: #fff8ba;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100px;
        padding: 8px;
        border-radius: 16px;
        margin: 24px 0;
        font-size: 14px;
      }
      
      .event .event-right .event-timing img {
        height: 20px;
        padding-right: 8px;
      }
      
      @media (max-width: 550px) {
        .event {
          flex-direction: column;
        }
      
        .event .event-left {
          padding: 0;
          border-radius: 8px 8px 0 0;
        }
      
        .event .event-left .event-date .date,
        .event .event-left .event-date .month {
          display: inline-block;
          font-size: 24px;
        }
      
        .event .event-left .event-date {
          padding: 10px 0;
        }
      }
      .fasfa-user:hover {
        background-color:  rgb(148, 148, 11); /* Change to the desired color */
    }

    
      
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
            <i class="fas fa-tools"></i>
            <span class="nav-item">Maintenance plans</span>
            </a>
          </li>
          <li>
            <a href="../g_view/manageservices.php">
              <i class="fas fa-concierge-bell"></i>
              <span class="nav-item">Service Request</span>
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
      
        <div class="main-top">
              <h1>DASHBOARD</h1>
              <i class="fas fa-user-cog"><?php echo $UserName1;?> <?php echo $UserName2;?></i> 
          </div>
        
        <section class="main-task">
          <section class="upcoming-tasks">
            <h2 style="color: rgb(8, 43, 8);">categories</h2>
                <div class="dashboard">    
                  <?php foreach ($categories as $category) : ?>
                          <div class="card" id="completion-rate-card">
                          <div onclick="showDescription('<?php echo $category['description']; ?>')">
                          <h3><?php echo $category['category_name']; ?></h3>
                          </div>
                          </div>
                  <?php endforeach; ?>
                   
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
    <button id="assignChoreBtn" style="font-size: 14px; cursor: pointer; position:fixed; top: 50px; right: 20px; padding: 10px; background:  rgb(148, 148, 11); color: #ffffff;" onclick="window.location.href = '../g_view/viewprovider.php';">View Providers</button>
    </div>


  </body>
</html>
