<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 3) header('location:extras/transfer.php');
};
*/
  include 'db_connection.php';
?>
<html>
<head>
  <link rel="stylesheet" href="CSS/patientDoctorStyle.css">
</head>
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

echo "<table width='30%' border=0>";

            echo "<th>Patient ID</th>";
            echo "<th>Date</th>";
            echo "<th>Time</th>";
            echo "<th>Comment</th>";
            echo "<th>Morning Med </th>";
            echo "<th>Lunch Med</th>";
            echo "<th>Night Med</th>";

        echo "</tr>";

while($res = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$res['patientID']."</td>";
    echo "<td>".$res['date']."</td>";
    echo "<td>".$res['time']."</td>";
    echo "<td>".$res['comment']."</td>";
    echo "<td>".$res['morningMed']."</td>";
    echo "<td>".$res['lunchMed']."</td>";
    echo "<td>".$res['nightMed']."</td>";

}

echo "</table>";
}

if(isset($_POST['date'])){
    $date = $_POST['date'];
    $comment = $_POST['comment'];
    $morningMed = $_POST['morningMed'];
    $lunchMed = $_POST['lunchMed'];
    $nightMed = $_POST['nightMed'];
};
if (isset($_POST['date'])){
  $sql = "INSERT INTO DoctorAppointments (date, comment, morningMed, lunchMed, nightMed, patientID, time)
  VALUES ('$_POST[date]', '$_POST[comment]', '$_POST[morningMed]', '$_POST[lunchMed]', '$_POST[nightMed]', '$_POST[patientID]', '$_POST[time]')
  ORDER BY date";
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
</html>
