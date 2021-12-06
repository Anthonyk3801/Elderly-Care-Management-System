<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if($_GET['error'] == 2) echo "You are not authorized for that page";
*/
include 'db_connection.php';
?>
<html>
<head>
  <link rel="stylesheet" href="CSS/rosterStyle.css">
</head>
<form action="roster.php" method="POST" id="rosterForm">
    Date: <input type="date" name="date" id="date"><br>
    <input type="submit" value="search" name="search" id="search">
</form>

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
</html>
