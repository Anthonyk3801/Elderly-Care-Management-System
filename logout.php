<?php
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:home.php"); //to redirect back to "home.php" after logging out
exit();
?>
