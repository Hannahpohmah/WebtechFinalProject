<?php
// Start session
session_start();

// Unset the session variables
unset($_SESSION["user_id"]);
unset($_SESSION["user_name"]);

// Redirect to login_view page
header("Location: home.php");
exit(); // Use the exit() command afterwards
?>
