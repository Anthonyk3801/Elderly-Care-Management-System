<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 1 || $_SESSION['level'] != 2) header('location:extras/transfer.php');
};
*/
  include 'db_connection.php';
?>

<form action="patientInformation.php" method="POST">

  <label for="patientID">Patient ID: </label>
  <input type="text" id="patientID" name="patientID">

  <br>
  <br>

  <input type="submit" id="sub1" value="Submit">
</form>

<br>
<br>

<form action="patient.php" method="POST">

  <label for="patientName">Patient Name: </label>
  <input readonly type="text" id="patientName" name="patientName">
​
  <br>
  <br>
​
  <label for="groupID">Group: </label>
  <select id="groupID" name="groupID">
      <option value="nothing"> --- </option>
      <option value="1"> 1 </option>
      <option value="2"> 2 </option>
      <option value="3"> 3 </option>
      <option value="4"> 4 </option>

  </select>
​
  <br>
  <br>
​
  <label for="admissionDate">Admission Date: </label>
  <input type="date" id="admissionDate" name="admissionDate">

  <br>
  <br>

  <input type="submit" id="sub2" value="Submit">
</form>
