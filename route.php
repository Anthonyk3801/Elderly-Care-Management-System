<?php

include 'db_connection.php';

/**/
/*
session_start();
if(isset($_SESSION['level'])){
    header('location:extras/transfer.php?error=2');
elseif(!isset($_SESSION['level'])){
    header('location:Home.php');
}else{
    session_destroy();
}
*/
/**/

if(isset($_POST['login'])){
    $email = strtolower($_POST['email']);
    $check = false;
    $table = '';
    $sql="Select * FROM Patient
    WHERE LOWER(email) = '$email' AND password = '$_POST[password]' AND approval = 1;";

    $result = $conn->query($sql);

    $cnt = mysqli_num_rows($result);
    if ( 0===$cnt ) {
        //echo 'no patient records <br>';
    }else {
        while( false!=($res=mysqli_fetch_array($result)) ) {
            $check = true;
            $table = 'Patient';
        }

    }
    $sql="Select * FROM FamilyMember
    WHERE LOWER(email) = '$email' AND password = '$_POST[password]' AND approval = 1;";

    $result = $conn->query($sql);

    $cnt = mysqli_num_rows($result);
    if ( 0===$cnt ) {
        //echo 'no family member records <br>';
    }else {
        while( false!=($res=mysqli_fetch_array($result)) ) {
            $check = true;
            $table = 'FamilyMember';
        }

    }
    $sql="Select * FROM Employee
    WHERE LOWER(email) = '$email' AND password = '$_POST[password]' AND approval = 1;";

    $result = $conn->query($sql);

    $cnt = mysqli_num_rows($result);
    if ( 0===$cnt ) {
        //echo 'no employee records <br>';
    }else {
        while( false!=($res=mysqli_fetch_array($result)) ) {
            $check = true;
            $table = 'Employee';
        }
    }
    if($check === false){
        header('location:login.php?error=1');
    }elseif($check === true){
        session_start();
        if($table == 'FamilyMember') {
            $_SESSION['level'] = 6;
            $_SESSION['role'] = 'FamilyMember';
        }elseif($table == 'Employee'){
            $sql = "Select role,employeeID from Employee where LOWER(email) = '$email';";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $_SESSION['role'] = strtolower($row['role']);
            $_SESSION['id'] = $row['employeeID'];

            $role = $_SESSION['role'];
            $sql = "Select accessLevel from Roles where LOWER(role) = '$role';";
            $result = $conn->query($sql);
            $res = $result->fetch_assoc();
            $_SESSION['level'] = $res['accessLevel'];

        }elseif($table == 'Patient') {
            $sql = "Select patientID from Patient where LOWER(email) = '$email';";
            $result = $conn->query($sql);
            $res = $result->fetch_assoc();
            $_SESSION['id'] = $res['patientID'];
            $_SESSION['level'] = 5;
            $_SESSION['role'] = 'Patient';
        }

        $sql = "Select * from $table WHERE LOWER(email) = '$email';";

        $result = $conn->query($sql);
        $res = $result->fetch_assoc();
        $_SESSION['fName'] = $res['fName'];
        $_SESSION['lName'] = $res['lName'];

        /*
        echo "First: " . $_SESSION['fName'] . "<br>";
        echo "Last: " . $_SESSION['lName'] . "<br>";
        echo "Access Level: " . $_SESSION['level'] . "<br>";
        echo "Role: " . $_SESSION['role'] . "<br>";
        if($table == 'Patient' || $table == 'Employee') echo "ID: " . $_SESSION['id'];
        */
    }

    if($_SESSION['level'] == 1 || $_SESSION['level'] == 2){
        header('location:roster.php');
    }elseif($_SESSION['level'] == 3){
        header('location:doctorHome.php');
    }elseif($_SESSION['level'] == 4){
        header('location:caregiverHome.php');
    }elseif($_SESSION['level'] == 5){
        header('location:patientHome.php');
    }elseif($_SESSION['level'] == 6){
        header('location:familyMemberHome.php');
    }
    
}

?>
