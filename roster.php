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
    Date: <input type="date" name="search"><br>
    <input type="submit" value="search" id="search">
</form>

<?php
if(isset($_POST['search'])){
$search = $_POST['search'];
$sql = "SELECT *
FROM Roster
WHERE date = '$search'";
$result = $conn->query($sql);

echo "<table width='30%' border=0>";

  echo "<th>Date</th>";
  echo "<th>Supervisor</th>";
  echo "<th>Doctor</th>";
  echo "<th>Caregiver1</th>";
  echo "<th>Caregiver2</th>";
  echo "<th>Caregiver3</th>";
  echo "<th>Caregiver4</th>";

        echo "</tr>";

while($res = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$res['date']."</td>";
    echo "<td>".$res['superVisorID']."</td>";
    echo "<td>".$res['doctorID']."</td>";
    echo "<td>".$res['careGiver1']."</td>";
    echo "<td>".$res['careGiver2']."</td>";
    echo "<td>".$res['careGiver3']."</td>";
    echo "<td>".$res['careGiver4']."</td";

}

echo "</table>";
}
?>
</html>
