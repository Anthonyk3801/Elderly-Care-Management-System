<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 5) header('location:extras/transfer.php');
};
if($_GET['error'] == 2) echo "You are not authorized for that page";
*/
echo "Patient Home";
?>