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
<!-- <link rel="stylesheet" href="CSS/patientDoctorStyle.css"> -->

<form action="patientDoctor.php" method="POST">
  Date: <input type="date" name="search"><br>
  <input type="submit" value="search" id="search">
</form>
<button onclick="test()" id="newPerscription">New Perscription</button>
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
    <td><input type="date" name="date" id="date"></td>
    <td><input type="time" name="time" id="time"></td>
    <td><input type="text" name="comment" id="comment"></td>
    <td><input type="text" name="morningMed" id="morningMed"></td>
    <td><input type="text" name="lunchMed" id="lunchMed"></td>
    <td><input type="text" name="nightMed" id="nightMed"></td>
  </tr>
</table>
<input type="submit" value="submit" id="submit">
</form>
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
