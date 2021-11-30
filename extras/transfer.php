<?php
session_start();

if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){
    header('location:/Elderly-Care-Management-System/roster.php?error=2');
}elseif($_SESSION['level'] == 3){
    header('location:/Elderly-Care-Management-System/doctorHome.php?error=2');
}elseif($_SESSION['level'] == 4){
    header('location:/Elderly-Care-Management-System/caregiverHome.php?error=2');
}elseif($_SESSION['level'] == 5){
    header('location:/Elderly-Care-Management-System/patientHome.php?error=2');
}elseif($_SESSION['level'] == 6){
    header('location:/Elderly-Care-Management-System/familyMemberHome.php?error=2');
}

?>