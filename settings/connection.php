<?php
// Database credentials
   $servername = "localhost";
   $username = "root";
   $password = "n!LM6M!mHKuO";
   $dbname = "home_maintenance";
   
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   
   // Check connection
   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   echo "Connected successfully";
?>
    //cs341webtech
