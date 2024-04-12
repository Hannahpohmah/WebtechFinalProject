<?php //include('../action/fetchAppointments.php'); 
session_start();
include ('../settings/core.php');
include ('../function/select_category_fxn.php');
$UserName1 = $_SESSION['fname'];
$UserName2 = $_SESSION['lname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<link rel="stylesheet" href="../g_css/dash_style.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .create-appointment {
      width: 330px;
      background-color: rgb(8, 43, 8);
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      border-radius: 10px;
      font-family: 'League Spartan', sans-serif;
      color: white;
    }

    .create-appointment label {
      font-size: 14px;
      margin-bottom: 5px;
      display: block;
    }

    .create-appointment textarea,
    .create-appointment input[type="time"],
    .create-appointment input[type="date"] {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      margin-bottom: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .create-appointment button[type="submit"] {
      padding: 10px;
      background-color: rgb(148, 148, 11); 
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      display: inline-block;
      margin-top: 10px;
    }

    .create-appointment button[type="submit"]:hover {
      background-color: black;
    }
    </style>

</head>
<body>
    <div class="container">
      <nav>
        <ul>
          <li>
            <a href="admin.php" class="logo">
              <img src="../g_img/logo.png" alt="">
              <span id="name" class="nav-item">Home maintenance</span>
            </a>
          </li>
          <li>
            <a href="../g_view/dash.php">
              <i class="fas fa-home"></i>
              <span class="nav-item">Home</span>
            </a>
          </li>
          <li>
            <a href="../g_view/maintenancePlans.php">
              <i class="fas fa-user"></i>
              <span class="nav-item">maintenance plans</span>
            </a>
          </li>
          
          <li>
            <a href="../g_view/notification.php" class="settings">
              <i class="fas fa-cog"></i>
              <span class="nav-item">Help</span>
            </a>
          </li>
          <li>
            <a href="../g_view/dash_help.php" class="help">
              <i class="fas fa-question-circle"></i>
              <span class="nav-item">settings</span>
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
        <section class="create-appointment">
          <h2>Request a New Service</h2>
          <form id="bookSlotForm" action="../action/manageAppointments_action.php" method="post" onsubmit="return validation()">
              <label for="category">Service category:</label>
              <select name="category" id="category" required>
                  <option value="">Select a category</option>
                  <?php foreach ($categories as $category) : ?>
                      <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                  <?php endforeach; ?>
              </select>
            
              <label for="request_date">Request Date</label>
              <input type="date" name="request_date" id="request_date" required><br><br>
              
              <label for="preferred_timing">Preferred Timing (hours):</label>
              <input type="number" name="preferred_timing" id="preferred_timing" min="1" required><br><br>

              
              <label for="special_instructions">Special Instructions</label>
              <textarea name="special_instructions" id="special_instructions" cols="30" rows="3"></textarea><br><br>

              <label for="emergency">Is this an emergency service?</label>
              <input type="checkbox" name="emergency" id="emergency"><br><br>

            <button type="submit" name ="submit" id = "submit">Book a service</button>
          </form>
        </section>

        <table id="appointmentTable">
          <thead>
            <?php include '../function/services_fxn.php';?>
          </thead>
          <tbody id="appointmentContainer"> 
    </tbody>
        </table>
      </section>


      
    </div>
    <script>
      function validation() {
        var requestDateInput = document.getElementById("request_date");
        var specialInstructionInput = document.getElementById("special_instruction");
        var requestDate = new Date(requestDateInput.value);
        var currentDate = new Date();
        var specialInstructionPattern = /^[a-zA-Z\s]*$/; 

        if (requestDate < currentDate) {
            alert("Request date cannot be in the past.");
            return false; // Prevent form submission
        }
        if (!specialInstructionPattern.test(specialInstructionInput.value)) {
          alert("Special instruction should only contain letters and spaces.");
          return false; // Prevent form submission
      }
        return true; // Allow form submission
    }

    </script>
    </body>
    </html>