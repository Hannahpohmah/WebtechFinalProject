<?php
// Include your database connection
include '../settings/connection.php';

session_start();
$UserName1 = $_SESSION['fname'];
$UserName2 = $_SESSION['lname'];
$vendor_id = $_SESSION['user_id'];

// Fetch reviews for the vendor
$sql = "SELECT * FROM reviews WHERE provider_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $vendor_id);
$stmt->execute();
$result = $stmt->get_result();

// Display reviews
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../g_css/dash_style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    
    <title>Vendor Reviews</title>
    <style>
    
    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .reviews {
        margin-top: 20px;
    }

    .review {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .review h3 {
        margin-bottom: 5px;
    }

    .review p {
        margin: 5px 0;
    }
    
    * {
        margin: 0;
        padding: 0;
        outline: none;
        border: none;
        text-decoration: none;
        box-sizing: border-box;
        font-family: 'League Spartan', sans-serif;

    }

    nav{
        position: relative;
        top: 0;
        bottom: 0;
        height: 100vh;
        left: 0;
        width: 320px;
        background:white;
        overflow: hidden;
        box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    }

    
    .logo span{
        font-weight: bold;
        padding-left: 15px;
        font-size: 18px;
        margin-top: 5px;
    }

    a{
        position: relative;
        color: black;
        font-style: 14px;
        display: table;
        width: 280px;
        padding: 10px;
    }

    nav .fas{
    position: relative;
    width: 70px;
    height: 40px;
    top: 14px;
    font-size: 20px;
    text-align: center;

    }

    .nav-item{
        position: relative;
        top: 12px;
    }

    a:hover{
        background-color: rgb(148, 148, 11);
        
    }

    .logout{
        position: absolute;
        bottom: 0;


    }

    .help{
        position: absolute;
        bottom: 60px;
    }

    .settings{
        position: absolute;
        bottom: 120px;
    }

    /* Main Section */
    .main{
        position: relative;
        padding: 20px;
        width: 100%;
        height: 100vh;
        overflow: auto;
    }
    .review:hover {
    background-color: #f9f9f9; /* Change background color on hover */
}   
</style>

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
            <a href="../g_view/planLists.php">
              <i class="fas fa-tools"></i>
              <span class="nav-item">Maintenance plans</span>
            </a>
          
          <li>
            <a href="../g_view/notification_page.php">
              <i class="fas fa-briefcase"></i>
              <span class="nav-item">Jobs</span>
            </a>
          </li>
         
          <li>
            <a href="../g_view/profile.php">
              <i class="fas fa-user"></i>
              <span class="nav-item">Profile</span>
            </a>
          </li>
         
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
            <i class="fas fa-user-cog"><?php echo $UserName1;?> <?php echo $UserName2;?></i> 
        </div>
            <h1>Vendor Reviews</h1>
            <div class="reviews">
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="review">
                        <p>Comment: <?php echo $row['review_text']; ?></p>
                        <p>Date: <?php echo $row['review_date']; ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        </body>
</html>
