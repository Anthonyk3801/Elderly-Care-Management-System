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

    switch($_SESSION['level']) {
      case '1':
        include 'templates/main-nav-bar.php';
        include 'templates/main-grid-content-2columns.html';
        include 'templates/admin-side-bar.html';
        break;
      case '2':
        include 'templates/main-nav-bar.php';
        include 'templates/main-grid-content-2columns.html';
        include 'templates/supervisor-side-bar.html';
        break;
      case '3':
        include 'templates/main-nav-bar.php';
        include 'templates/main-grid-content-2columns.html';
        include 'templates/doctor-side-bar.html';
        break;
      case '4':
        include 'templates/main-nav-bar.php';
        include 'templates/main-grid-content-2columns.html';
        include 'templates/caregiver-side-bar.html';
        break;
      case '5':
        include 'templates/main-nav-bar.php';
        include 'templates/main-grid-content-2columns.html';
        include 'templates/patient-side-bar.html';
        break;
      case '6':
        include 'templates/main-nav-bar.php';
        include 'templates/main-grid-content-2columns.html';
        include 'templates/familyMember-side-bar.html';
        break;
      default:
        include 'templates/alert-message-before-login.html';
        include 'templates/home-nav-bar.html';
        include 'templates/main-grid-content-1column.html';
    }

    include 'templates/main-content.html';
?>
<!-- <link rel="stylesheet" href="CSS/patientStyles.css"> -->
<head>
    <link rel="stylesheet" href="CSS/adminReport.css">
</head>

<h1 class="text-center mb-5">Admin’s Report</h1>
<hr>

<div class="mt-5 mb-5 text-dark text-end">
        <form action="adminReport.php" method="post">
            <label for="date">Date: </label>
            <input class="text-end" type="date" name="date" id="date" value=<?php if(isset($_POST['search'])) echo $_POST['date'];?>>
            <button class="btn btn-sm btn-info text-light mt-0 mb-1" type="submit" name="search" id="search" value="SEARCH">Search</button>
        </form>
</div>

<div class="mb-5 pb-5 text-dark text-center">
<h2 class="text-start text-info mb-4">Missed Patient Activity</h2>
        <table>
          <tr>
            <th class="p-2">Patient Name</th>
            <th class="p-2">Patient ID</th>
            <th class="p-2">Doctor Name</th>
            <th class="p-2">Caregiver Name</th>
            <th class="p-2">Appointment Time</th>
            <th class="p-2">Attendend Appointment</th>
            <th class="p-2">Breakfast</th>
            <th class="p-2">Morning Med</th>
            <th class="p-2">Lunch</th>
            <th class="p-2">Lunch Med</th>
            <th class="p-2">Dinner</th>
            <th class="p-2">Night Med</th>
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
                    echo "<td class='center'> X </td>";
                }elseif($attendance == 1){
                    echo "<td class='center'> &#10004; </td>";
                }else{
                    echo "<td> No App </td>";
                }
                if($res['breakfast'] == 0) {
                    echo "<td class='center'> X </td>";
                }else{
                    echo "<td class='center'> &#10004; </td>";
                }
                if($res['morningMedCheck'] == 0) {
                    echo "<td class='center'> X </td>";
                }else{
                    echo "<td class='center'> &#10004; </td>";
                }
                if($res['lunch'] == 0) {
                    echo "<td class='center'> X </td>";
                }else{
                    echo "<td class='center'> &#10004; </td>";
                }
                if($res['lunchMedCheck'] == 0) {
                    echo "<td class='center'> X </td>";
                }else{
                    echo "<td class='center'> &#10004; </td>";
                }
                if($res['dinner'] == 0) {
                    echo "<td class='center'> X </td>";
                }else{
                    echo "<td class='center'> &#10004; </td>";
                }
                if($res['nightMedCheck'] == 0) {
                    echo "<td class='center'> X </td>";
                }else{
                    echo "<td class='center'> &#10004; </td>";
                }
                }
            }
            ?>

        </table>
</div>

<?php // TEMPLATES
include 'templates/end-main-content.html';
include 'templates/footer.html';
?>
