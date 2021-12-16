<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
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
  <!-- <link rel="stylesheet" href="CSS/rosterStyle.css"> -->

<h1 class="text-center">Roster</h1>
<hr>

<div class="mt-5 mb-5 text-dark text-center m-5 p-5">
<form action="roster.php" method="POST" id="rosterForm">
    <label for="date">Date </label>
    <br>
    <input class="text-end" type="date" name="date" id="date">

    <button class="w-50 btn btn-sm btn-info text-light mt-3 mb-1" type="submit" value="search" name="search" id="search">Submit</button>
</form>
</div>

<?php
if(isset($_POST['search'])){
$sql = "SELECT *
FROM Roster
WHERE date = '$_POST[date]'";
$result = $conn->query($sql);
$res = $result->fetch_assoc();

$sql = "SELECT employeeID, fName, lName
FROM Employee
INNER JOIN Roster
ON Employee.employeeID = Roster.superVisorID";
$result = $conn->query($sql);
$super = $result->fetch_assoc();
$supervisor = $super['fName'] . " " . $super['lName'];

$sql = "SELECT employeeID, fName, lName
FROM Employee
INNER JOIN Roster
ON Employee.employeeID = Roster.doctorID";
$result = $conn->query($sql);
$doc = $result->fetch_assoc();
$doctor = $doc['fName'] . " " . $doc['lName'];

$sql = "SELECT employeeID, fName, lName
FROM Employee
INNER JOIN Roster
ON Employee.employeeID = Roster.careGiver1";
$result = $conn->query($sql);
$caregiver = $result->fetch_assoc();
$caregiver1 = $caregiver['fName'] . " " . $caregiver['lName'];

$sql = "SELECT employeeID, fName, lName
FROM Employee
INNER JOIN Roster
ON Employee.employeeID = Roster.careGiver2";
$result = $conn->query($sql);
$care = $result->fetch_assoc();
$caregiver2 = $care['fName'] . " " . $care['lName'];

$sql = "SELECT employeeID, fName, lName
FROM Employee
INNER JOIN Roster
ON Employee.employeeID = Roster.careGiver3";
$result = $conn->query($sql);
$giver = $result->fetch_assoc();
$caregiver3 = $giver['fName'] . " " . $giver['lName'];

$sql = "SELECT employeeID, fName, lName
FROM Employee
INNER JOIN Roster
ON Employee.employeeID = Roster.careGiver4";
$result = $conn->query($sql);
$caregive = $result->fetch_assoc();
$caregiver4 = $caregive['fName'] . " " . $caregive['lName'];
/*if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }*/
echo "<table width='30%' border=0>";

  echo "<th>Date</th>";
  echo "<th>Supervisor</th>";
  echo "<th>Doctor</th>";
  echo "<th>Caregiver1</th>";
  echo "<th>Caregiver2</th>";
  echo "<th>Caregiver3</th>";
  echo "<th>Caregiver4</th>";

        echo "</tr>";

    echo "<tr>";
    echo "<td>".$res['date']."</td>";
    echo "<td>".$supervisor."</td>";
    echo "<td>".$doctor."</td>";
    echo "<td>".$caregiver1."</td>";
    echo "<td>".$caregiver2."</td>";
    echo "<td>".$caregiver3."</td>";
    echo "<td>".$caregiver4."</td";

echo "</table>";
}
?>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
