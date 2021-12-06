<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 1 || $_SESSION['level'] != 2) header('location:extras/transfer.php');
};
*/
include 'db_connection.php';
echo "Admin Report";

if(isset($_POST['search'])) {
    $sql = "SELECT * FROM PatientChecklist
    where date='$_POST[date]'";
    $result = $conn->query($sql);
}


?>

<html>
    <head>
        <link rel="stylesheet" href="CSS/patientStyles.css">
    </head>
    <body>
        <form action="adminReport.php" method="post">
            <label for="date">Date: </label>
            <input type="date" name="date" id="date" value=<?php if(isset($_POST['search'])) echo $_POST['date'];?>>
            <input type="submit" name="search" id="search" value="SEARCH">
        </form>

        <table>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Caregiver Name</th>
            <th>Doctor Appointment</th>
            <th>Attendend Appointment</th>
            <th>Breakfast</th>
            <th>Morning Med</th>
            <th>Lunch</th>
            <th>Lunch Med</th>
            <th>Dinner</th>
            <th>Night Med</th>
                    
            </tr>
            <?php 
            
            while($res = mysqli_fetch_array($result)) { 
                $sql="SELECT * FROM DoctorAppointments WHERE date='$_POST[date]' AND patientID=$res[patientID]";
                $result2 = $conn->query($sql);
                $appoint = $result2->fetch_assoc();
                
                echo "<tr>";
                echo "<td>".$res['patientID']."</td>";
                echo "<td>".$appoint['doctorID']."</td>";
                echo "<td> caregiver name </td>";    
                echo "<td>".$appoint['time']."</td>";
                echo "<td>".$appoint['attendance']."</td>";
                echo "<td>".$res['breakfast']."</td>";
                echo "<td>".$res['morningMedCheck']."</td>";
                echo "<td>".$res['lunch']."</td>";
                echo "<td>".$res['lunchMedCheck']."</td>";
                echo "<td>".$res['dinner']."</td>";
                echo "<td>".$res['nightMedCheck']."</td>";
                        
            }
            ?> 

        </table>
    </body>
</html>