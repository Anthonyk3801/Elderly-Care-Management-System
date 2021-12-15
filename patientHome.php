<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 5) header('location:extras/transfer.php');
};
if($_GET['error'] == 2) echo "You are not authorized for that page";
*/
include 'db_connection.php';
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

<h1 class="text-center">Patient's Home</h1>
<hr>

<?php
$sql = "SELECT patientID, fName, lName
FROM Patient";
$result = $conn->query($sql);
$patN = $result->fetch_assoc();
$patient = $patN['fName'] . " " . $patN['lName'];

$sql = "SELECT patientID, fName, lName
FROM Patient";
$result = $conn->query($sql);
$patID = $result->fetch_assoc();
$pat = $patID['patientID'];
?>

<div class="mt-5 mb-5">

<form action="patientHome.php" method="POST" id="patientForm">

  <label for="patientID">Patient ID:</label>
  <input readonly type="number" name="patientID" id="patientID" required value='<?php echo $_SESSION['id'];?>' min="1"><br>

  <label for="fName">Patient Name:</label>
  <input readonly type="text" name="fName" id="fName" required value='<?php echo $_SESSION['fName']. " " . $_SESSION['lName'];?>'><br>

  <label for="date">Date:</label>
  <input type='date' name="date" id='date' value='<?php echo date('Y-m-d');?>'><br>

  <button class="w-100 btn btn-sm btn-info text-light mt-5 mb-1" type="submit" value="search" name="search" id="search">Submit</button>

</form>

</div>

<?php
$caregiver = "";
$doctor = "";
if(isset($_POST['search'])){
$patient = $_SESSION['fName']. " " . $_SESSION['lName'];
$pat = $_SESSION['id'];
$sql = "SELECT *
FROM PatientChecklist
WHERE date = '$_POST[date]'";
$result = $conn->query($sql);
$res = $result->fetch_assoc();
$cnt = mysqli_num_rows($result);
if ( 0 === $cnt ) {
echo "<p style='color:red;'>Wrong PatientID or Patient Name</p>";
}else {
$sql = "SELECT *
FROM Patient
WHERE patientID = $_POST[patientID]";
$result = $conn->query($sql);
$patient = $result->fetch_assoc();
$group = $patient['groupID'];

$sql = "SELECT *
FROM Roster
WHERE date = '$_POST[date]'";
$result = $conn->query($sql);
$roster = $result->fetch_assoc();
if($group == 1) $careID = $roster['careGiver1'];
if($group == 2) $careID = $roster['careGiver2'];
if($group == 3) $careID = $roster['careGiver3'];
if($group == 4) $careID = $roster['careGiver4'];
$doctorID = $roster['doctorID'];

$sql = "SELECT *
FROM Employee
WHERE employeeID = $doctorID";
$result = $conn->query($sql);
$employee = $result->fetch_assoc();
$doctor = $employee['fName'] . " " . $employee['lName'];

$sql = "SELECT *
FROM Employee
WHERE employeeID = $careID";
$result = $conn->query($sql);
$emp = $result->fetch_assoc();
$caregive = $emp['fName'] . " " . $emp['lName'];

$sql = "SELECT *
FROM DoctorAppointments
WHERE patientID = $_POST[patientID] AND date = '$_POST[date]'";
$result = $conn->query($sql);
$appoint = $result->fetch_assoc();



echo "<table width='30%' border=0>";

            echo "<th>Doctor's Name</th>";
            echo "<th>Doctor's Appointment </th>";
            echo "<th>Caregiver's Name</th>";
            echo "<th>Morning Medicine</th>";
            echo "<th>Afternoon Medicine</th>";
            echo "<th>Night Medicine</th>";
            echo "<th>Breakfast</th>";
            echo "<th>Lunch</th>";
            echo "<th>Dinner</th>";

        echo "</tr>";

    echo "<tr>";
    echo "<td>".$doctor."</td>";
    if(isset($appoint['time'])){
        echo "<td> Appointment Time: " . $appoint['time'] . " </td>";
    }else{
        echo "<td> No Appointment </td>";
    }
    echo "<td>".$caregive."</td>";
    if($res['morningMedCheck'] == 0) {
        echo "<td> X </td>";
    }elseif($res['morningMedCheck'] == 1){
        echo "<td> &#10004; </td>";
    }
    if($res['lunchMedCheck'] == 0) {
        echo "<td> X </td>";
    }elseif($res['lunchMedCheck'] == 1){
        echo "<td> &#10004; </td>";
    }
    if($res['nightMedCheck'] == 0) {
        echo "<td> X </td>";
    }elseif($res['nightMedCheck'] == 1){
        echo "<td> &#10004; </td>";
    }
    if($res['breakfast'] == 0) {
        echo "<td> X </td>";
    }elseif($res['breakfast'] == 1){
        echo "<td> &#10004; </td>";
    }
    if($res['lunch'] == 0) {
        echo "<td> X </td>";
    }elseif($res['lunch'] == 1){
        echo "<td> &#10004; </td>";
    }
    if($res['dinner'] == 0) {
        echo "<td> X </td>";
    }elseif($res['dinner'] == 1){
        echo "<td> &#10004; </td>";
    }

}
}
echo "</table>";
?>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
