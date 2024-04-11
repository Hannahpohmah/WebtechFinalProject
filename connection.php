<?php      
   $servername = "localhost";
   $username = "bitnami";
   $password = "n!LM6M!mHKuO";
   $database = "home_maintenance";
    
    // Create connection
   $conn = new mysqli($servername, $username, $password, $database);
    
    // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
     
?>
