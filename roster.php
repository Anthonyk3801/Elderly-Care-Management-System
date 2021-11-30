<?php
session_start();
if(!isset($_SESSION['level'])) header('location:home.php');
include 'db_connection.php';
?>
<html>
<head>
  <link rel="stylesheet" href="CSS/rosterStyle.css">
</head>
<form action="roster.php" method="POST" id="rosterForm">
    <label for="date">Date</label>
    <input type="date" name="date" id="date">
    <input type="submit" value="submit" id="submit">
</form>
</html>
<?php
if(isset($_POST['date'])){
    $date = $_POST['date'];
};
if (isset($_POST['date'])){
  $sql = "INSERT INTO Roster (date, superVisorID, doctorID, careGiver1, careGiver2, careGiver3, careGiver4, groupID)
  VALUES ('$date', '$superVisorID', '$doctorID', '$careGiver1', '$careGiver2', '$careGiver3', '$careGiver4', '$groupID')";
}
?>
