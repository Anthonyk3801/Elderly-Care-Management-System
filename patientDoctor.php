<?php
  include 'db_connection.php';
?>
<html>
<head>
  <link rel="stylesheet" href="CSS/patientDoctorStyle.css">
</head>
<form action="patientDoctor.php" method="POST">
    <label for="search">Date Search:</label>
    <input type="text" name="search" id="search" required>
    <input type="submit" id="enter" value="Submit">
</form>
<button onclick="test()" id="newPerscription">New Perscription</button>
<form action="patientDoctor.php" method="POST">
<div id="hide">
<table>
  <tr>
  <th>Comment</th>
  <th>Morning Med</th>
  <th>Afternoon Med</th>
  <th>Night Med</th>
  </tr>
  <tr>
    <td><input type="text" name="comment" id="comment"></td>
    <td><input type="text" name="morningMed" id="morningMed"></td>
    <td><input type="text" name="lunchMed" id="lunchMed"></td>
    <td><input type="text" name="nightMed" id="nightMed"></td>
  </tr>
</table>
  <input type="submit" value="submit" id="submit">
</form>
</div>
</html>
<script>
function test() {
  let x = document.getElementById("hide");
  if (window.getComputedStyle(x).display === "none") {
    x.style.display = "block";
  }
}
</script>
<?php
$search = $_POST['search'];
$sql = "SELECT *
FROM DoctorAppointments
WHERE date like '%$search%'";
$result = $conn->query($sql);

if(isset($_POST['submit'])){
    $comment = $_POST['comment'];
    $morningMed = $_POST['morningMed'];
    $afternoonMed = $_POST['lunchMed'];
    $nightMed = $_POST['nightMed'];
};
if(isset($_POST['submit'])){
  $sql = "UPDATE DoctorAppointments
  SET comment='comment', morningMed='morningMed', lunchMed='lunchMed', nightMed='nightMed')";
}
?>
