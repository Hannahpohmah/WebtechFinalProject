<?php //include('../action/fetchAppointments.php'); 
session_start();

$UserName1 = $_SESSION['fname'];
$UserName2 = $_SESSION['lname'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="../g_css/notification_page_style.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <a href="admin.php" class="logo">
              <img src="../g_img/logo.png" alt="">
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
            <a href="../g_view/PlanLists.php">
              <i class="fas fa-user"></i>
              <span class="nav-item">maintenance plans</span>
            </a>
          </li>
          <li>
            <a href="../g_view/admin.php">
              <i class="fas fa-concierge-bell"></i>
              <span class="nav-item">service request</span>
            </a>
          </li>
         
          <li>
            <a href="../g_view/daelp.php" class="help">
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
        
        <section class="main-task">
        <h1>Jobs</h1>
        <button id="toggleChoreList" style="font-size: 14px; background: linear-gradient(40deg, #1e3443, #2c0b40); color: #ffffff;">services</button>
          <?php include '../function/providerlist_accepted_fxn.php';?>
          <?php include '../function/providerlist_acceptedplans_fxn.php';?>
        </section> 
      </section>
    </div>
    <script>
      function editstatus(id){
        Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to cancel this request.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the edit form
                    window.location.href = "../action/reversestatus.php?id=" + id ;
                }
            });
        }

        

        document.getElementById('toggleChoreList').addEventListener('click', function() {
        var button = this;
        const servicesTable = document.getElementById('servicesTable');
        const otherTable = document.getElementById('planTable');
        if (servicesTable.style.display === 'none') {
            servicesTable.style.display = 'table';
            otherTable.style.display = 'none';
            button.innerText = 'Other Data';
        } else {
            servicesTable.style.display = 'none';
            otherTable.style.display = 'table';
            button.innerText = 'Services';
        }
    });


      
    </script>
  </body>
</html>
