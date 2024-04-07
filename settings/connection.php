<?php      
    $host = "localhost";  
    $user = "root";  
    $password = 'MBAFOR41*123#HHHH';  

    $db_name = "home_maintenance";  

      
    $conn = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        echo "Error connecting";
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  


    //cs341webtech