<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 3) header('location:extras/transfer.php');
};
*/
  include 'db_connection.php';
  $date = date('Y-m-d');
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
<head>
  <link rel="stylesheet" href="CSS/patientDoctorStyle.css">
</head>

<h1 class="text-center">Patient of Doctor</h1>
<hr>

<?php
if(isset($_POST['con'])){
$arr = explode(" ", $_POST['con']);
$pID = $arr[0];
$d = $arr[1];
}
?>

<div class="m-5 p-5">

<button class="w-100 btn btn-sm btn-info text-light mt-4" onclick="test()" id="newPerscription" <?php if($d != $date) echo 'disabled'; ?>>New Prescription</button>
<form action="doctorHome.php" method="POST">
<div id="hide">
<table>
  <tr>
  <th>Patient ID</th>
  <th>Date</th>
  <th>Comment</th>
  <th>Morning Med</th>
  <th>Afternoon Med</th>
  <th>Night Med</th>
  </tr>
  <tr>
    <td><input type="number" name="patientID" required id="patientID" readonly value="<?php echo $pID; ?>"></td>
    <td><input class="text-end" type="date" name="date" id="date" readonly value="<?php echo $d; ?>"></td>
    <td><input type="text" name="comment" required id="comment"></td>
    <td><input type="text" name="morningMed" required id="morningMed"></td>
    <td><input type="text" name="lunchMed" required id="lunchMed"></td>
    <td><input type="text" name="nightMed" required id="nightMed"></td>
  </tr>
</table>
<button class="w-100 btn btn-sm btn-info text-light mt-4 mb-1" type="submit" name="create" id="create" value="CREATE">Submit</button>
<button class="w-100 btn btn-sm btn-secondary text-light mt-1 mb-1" type="reset">Cancel</button>
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
$sql = "SELECT *
FROM DoctorAppointments
WHERE date = '$d' AND patientID = $pID";
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
?>

</div>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
