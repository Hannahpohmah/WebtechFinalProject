<!-- 
  <?php 

session_start();
include "../settings/core.php";
//Login_session();
  
//$UserID = $_SESSION['user_id'];
$UserName1 = $_SESSION['fname'];
$UserName2 = $_SESSION['lname'];

?>
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <a href="" class="logo">
              <img src="../g_img/logo.png" alt="" />
              <span id="name" class="nav-item">Home Maintenance</span>
            </a>
          </li>
          <li>
            <a href="">
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
            <a href="../g_view/planLists.php">
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
        
        <section class="main-task">
        <?php include('../function/servicesList_fxn.php'); ?>
        </section>

    <script src="../g_js/admin_script.js"></script>
    <script>
      function AcceptService(id){
        Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to accept this request.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, edit it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect to the edit form
                    window.location.href = "../g_view/updatestatus.php?id=" + id ;
                }
            });
        }
    </script>
  </body>

  
</html>
