<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 1 || $_SESSION['level'] != 2) header('location:extras/transfer.php');
};
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

<h1 class="text-center">Additional Information of Patient</h1>
<hr>

<div class="mb-5 mt-5 text-center">
<form action="patientInformation.php" method="POST">
  <label for="patientID">Patient ID: </label>
  <input type="text" id="patientID" name="patientID" minlength="5" maxlength="5">
  <input class="btn-info text-light rounded" type="submit" id="sub1" value="Submit">
</form>
</div>

<hr>

<div class="mb-5 mt-5 text-start">
<form action="patient.php" method="POST">
  <label for="patientName">Patient Name: </label>
  <input readonly type="text" id="patientName" name="patientName">
  <br>
  <br>
  <label for="groupID">Group: </label>
  <select id="groupID" name="groupID">
      <option value="nothing"> --- </option>
      <option value="1"> 1 </option>
      <option value="2"> 2 </option>
      <option value="3"> 3 </option>
      <option value="4"> 4 </option>
  </select>
  <br>
  <br>
  <label for="admissionDate">Admission Date: </label>
  <input type="date" id="admissionDate" name="admissionDate">
  <br>
  <br>
  <button class="w-100 btn btn-sm btn-info text-light mt-1 mb-1" id="sub2" type="submit" value="Submit">Submit</button>
  <button class="w-100 btn btn-sm btn-secondary text-light mt-1 mb-1" type="reset">Cancel</button>
</form>
</div>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
