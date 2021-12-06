<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 1 || $_SESSION['level'] != 2) header('location:extras/transfer.php');
};
*/
include 'db_connection.php';

if(isset($_POST['search'])) {
    $sql = "SELECT * FROM PatientChecklist
    where date='$_POST[date]'";
    $result = $conn->query($sql);
}
$doctorName = 0;
$attendance = 0;
$time = 0;
$caregiverName = 0;
?>

<?php //TEMPLATES
    include 'templates/header.html';
    //include 'templates/alert-message-before-login.html';
    include 'templates/nav-bar.html';
    include 'templates/main-grid-content-1column.html';
    //include 'templates/main-grid-content-2columns.html';
    //include 'templates/side-bar.html';
    //include 'templates/side-bar-hidden.html';
    include 'templates/main-content.html';
    //include 'templates/end-main-content.html';
    //include 'templates/footer.html';
?>
<!-- <link rel="stylesheet" href="CSS/patientStyles.css"> -->

<h1>Admin’s Report</h1>
<hr>
<br>

        <form action="adminReport.php" method="post">
            <label for="date">Date: </label>
            <input type="date" name="date" id="date" value=<?php if(isset($_POST['search'])) echo $_POST['date'];?>>
            <input type="submit" name="search" id="search" value="SEARCH">
        </form>

        <table>
          <tr>
            <th>Patient Name</th>
            <th>Patient ID</th>
            <th>Doctor Name</th>
            <th>Caregiver Name</th>
            <th>Appointment Time</th>
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
                //Getting all of the doctor information if there is an appointment
                $sql="SELECT * FROM DoctorAppointments WHERE date='$_POST[date]' AND patientID=$res[patientID]";
                $result2 = $conn->query($sql);
                $appoint = $result2->fetch_assoc();
                $cnt = mysqli_num_rows($result2);
                if ( 0===$cnt ) {
                    $doctorName = "No App";
                    $attendance = "No App";
                    $time = "No App";
                }else {
                    $sql="SELECT * FROM Employee WHERE employeeID = $appoint[doctorID]";
                    $result3 = $conn->query($sql);
                    $doc = $result3->fetch_assoc();
                    $doctorName = $doc['fName'] . " " . $doc['lName'];
                    $attendance = $appoint['attendance'];
                    $time = $appoint['time'];
                }
                if($res['breakfast'] == 0 || $res['lunch'] == 0 || $res['dinner'] == 0 || $res['morningMedCheck'] == 0 ||
                $res['lunchMedCheck'] == 0 || $res['nightMedCheck'] == 0 || $attendance == 0){
                //Getting the patients name from their ID
                $sql = "SELECT * FROM Patient WHERE patientID = $res[patientID] AND approval = 1";
                $result4 = $conn->query($sql);
                $patient = $result4->fetch_assoc();
                $group = $patient['groupID'];

                //Getting name of the caregiver
                $sql = "SELECT * FROM Roster WHERE date='$_POST[date]'";
                $result5 = $conn->query($sql);
                $care = $result5->fetch_assoc();
                if($group == 1) $caregiverName = $care['careGiver1'];
                if($group == 2) $caregiverName = $care['careGiver2'];
                if($group == 3) $caregiverName = $care['careGiver3'];
                if($group == 4) $caregiverName = $care['careGiver4'];

                $sql="SELECT * FROM Employee WHERE employeeID = $caregiverName";
                $result6 = $conn->query($sql);
                $care = $result6->fetch_assoc();


                echo "<tr>";
                echo "<td>".$patient['fName'] . " " . $patient['lName'] . "</td>";
                echo "<td>".$res['patientID']."</td>";
                echo "<td>".$doctorName."</td>";
                echo "<td>".$care['fName'] . " " . $care['lName'] . "</td>";
                echo "<td>".$time."</td>";
                if($attendance == 0) {
                    echo "<td> X </td>";
                }elseif($attendance == 1){
                    echo "<td> &#10004; </td>";
                }else{
                    echo "<td> No App </td>";
                }
                if($res['breakfast'] == 0) {
                    echo "<td> X </td>";
                }else{
                    echo "<td> &#10004; </td>";
                }
                if($res['morningMedCheck'] == 0) {
                    echo "<td> X </td>";
                }else{
                    echo "<td> &#10004; </td>";
                }
                if($res['lunch'] == 0) {
                    echo "<td> X </td>";
                }else{
                    echo "<td> &#10004; </td>";
                }
                if($res['lunchMedCheck'] == 0) {
                    echo "<td> X </td>";
                }else{
                    echo "<td> &#10004; </td>";
                }
                if($res['dinner'] == 0) {
                    echo "<td> X </td>";
                }else{
                    echo "<td> &#10004; </td>";
                }
                if($res['nightMedCheck'] == 0) {
                    echo "<td> X </td>";
                }else{
                    echo "<td> &#10004; </td>";
                }
                }
            }
            ?>

        </table>

<?php // TEMPLATES
include 'templates/end-main-content.html';
include 'templates/footer.html';
?>
