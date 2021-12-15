<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 3) header('location:extras/transfer.php');
};
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
<!-- <link rel="stylesheet" href="CSS/patientDoctorStyle.css"> -->

<h1 class="text-center">Patient of Doctor</h1>
<hr>

<head>
  <link rel="stylesheet" href="CSS/patientDoctorStyle.css">
</head>

<div class="mt-5 mb-5 text-dark">
<form action="patientDoctor.php" method="POST">
  <label for="search">Date: </label>
  <input class="text-end" type="date" name="search"><br>
  <button class="w-100 btn btn-sm btn-info text-light mt-4" type="submit" value="search" id="search">Search</button>
</form>

<button class="w-100 btn btn-sm btn-info text-light mt-4" onclick="test()" id="newPerscription">New Prescription</button>
<form action="patientDoctor.php" method="POST">
<div id="hide">
<table>
  <tr>
  <th>Patient ID</th>
  <th>Date</th>
  <th>Time</th>
  <th>Comment</th>
  <th>Morning Med</th>
  <th>Afternoon Med</th>
  <th>Night Med</th>
  </tr>
  <tr>
    <td><input type="number" name="patientID" id="patientID"></td>
    <td><input class="text-end" type="date" name="date" id="date"></td>
    <td><input class="text-end" type="time" name="time" id="time"></td>
    <td><input type="text" name="comment" id="comment"></td>
    <td><input type="text" name="morningMed" id="morningMed"></td>
    <td><input type="text" name="lunchMed" id="lunchMed"></td>
    <td><input type="text" name="nightMed" id="nightMed"></td>
  </tr>
</table>
<button class="w-100 btn btn-sm btn-info text-light mt-4 mb-1" type="submit" name="create" id="create" value="CREATE">Submit</button>
<button class="w-100 btn btn-sm btn-secondary text-light mt-1 mb-1" type="reset">Cancel</button>
</form>
</div>
</div>
<script>
function test() {
  let x = document.getElementById("hide");
  if (window.getComputedStyle(x).display === "none") {
    x.style.display = "block";
  }else if (window.getComputedStyle(x).display === "block") {
    x.style.display = "none";
  }
}
</script>

<?php
if(isset($_POST['search'])){
$search = $_POST['search'];
$sql = "SELECT *
FROM DoctorAppointments
WHERE date = '$search'";
$result = $conn->query($sql);
$res = $result->fetch_assoc();

$sql = "SELECT employeeID, fName, lName
FROM Employee
INNER JOIN DoctorAppointments
ON Employee.employeeID = DoctorAppointments.doctorID";
$result = $conn->query($sql);
$doc = $result->fetch_assoc();
$doctor = $doc['fName'] . " " . $doc['lName'];

echo "<table width='30%' border=0>";

            echo "<th>Doctor</th>";
            echo "<th>Patient ID</th>";
            echo "<th>Date</th>";
            echo "<th>Time</th>";
            echo "<th>Comment</th>";
            echo "<th>Morning Med </th>";
            echo "<th>Lunch Med</th>";
            echo "<th>Night Med</th>";
            echo "<th>Attendance</th>";

        echo "</tr>";

    echo "<tr>";
    echo "<td>".$doctor."</td>";
    echo "<td>".$res['patientID']."</td>";
    echo "<td>".$res['date']."</td>";
    echo "<td>".$res['time']."</td>";
    echo "<td>".$res['comment']."</td>";
    echo "<td>".$res['morningMed']."</td>";
    echo "<td>".$res['lunchMed']."</td>";
    echo "<td>".$res['nightMed']."</td>";
    if($res['attendance'] == 0) {
        echo "<td> X </td>";
    }else{
        echo "<td> &#10004; </td>";
    }

echo "</table>";
}

if(isset($_POST['date'])){
    //$doctor = $_POST['doctorID'];
    $patient = $_POST['patientID'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $comment = $_POST['comment'];
    $morningMed = $_POST['morningMed'];
    $lunchMed = $_POST['lunchMed'];
    $nightMed = $_POST['nightMed'];
    //$attendance = $_POST['attendance'];
};
if (isset($_POST['date'])){
  $sql = "UPDATE DoctorAppointments
  SET comment = '$_POST[comment]', morningMed = '$_POST[morningMed]', nightMed = '$_POST[nightMed]', attendance = 1
  WHERE patientID = $_POST[patientID] AND date = '$_POST[date]'";
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
