<?php
  include 'db_connection.php';
?>
<html>
<head>
  <link rel="stylesheet" href="CSS/patientDoctorStyle.css">
</head>
<button onclick="test()" id="newPerscription">New Perscription</button>
<div id="hide">
<table>
  <tr>
  <th>Comment</th>
  <th>Morning Med</th>
  <th>Afternoon Med</th>
  <th>Night Med</th>
  </tr>
  <tr>
    <td><input type="text"></td>
    <td><input type="text"></td>
    <td><input type="text"></td>
    <td><input type="text"></td>
  </tr>
</table>
<form action="patientDoctor.php">
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
if(isset($_POST['submit'])){
    $comment = $_POST['comment'];
    $morningMed = $_POST['morningMed'];
    $afternoonMed = $_POST['lunchMed'];
    $nightMed = $_POST['nightMed'];
};
if (isset($_POST['submit'])){
  $sql = "INSERT INTO DoctorAppointments (patientID, date, time, comment, morningMed, lunchMed, nightMed)
  VALUES ('patientID', 'date', 'time', '$comment', '$morningMed', '$lunchMed', '$nightMed')";
}
?>
