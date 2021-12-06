<?php
session_start();
/*
if(!isset($_SESSION['level'])){
    header('location:/Elderly-Care-Management-System/Home.php');
}else{
}
*/

if($_GET['error'] == 2){
    if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){
        header('location:/Elderly-Care-Management-System/roster.php');
    }elseif($_SESSION['level'] == 3){
        header('location:/Elderly-Care-Management-System/doctorHome.php');
    }elseif($_SESSION['level'] == 4){
        header('location:/Elderly-Care-Management-System/caregiverHome.php');
    }elseif($_SESSION['level'] == 5){
        header('location:/Elderly-Care-Management-System/patientHome.php');
    }elseif($_SESSION['level'] == 6){
        header('location:/Elderly-Care-Management-System/familyMemberHome.php');
    }
}else{
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
}


?>