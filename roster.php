<form action="roster.php" method="POST">
    <label for="date">Date</label>
    <input type="date" name="date" id="date">
</form>
<?php
if(isset($_POST['date'])){
    $empID = $_POST['date'];
};
if (isset($_POST['empID'])){
  $sql = "INSERT INTO Roster (date, superVisorID, doctorID, careGiver1, careGiver2, careGiver3, careGiver4, groupID)
  VALUES ('$date', '$superVisorID', '$doctorID', '$careGiver1', '$careGiver2', '$careGiver3', '$careGiver4', '$groupID')";
}
?>
