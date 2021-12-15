<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 1 || $_SESSION['level'] != 2) header('location:extras/transfer.php');
};
*/
include 'db_connection.php';

//$date = date('Y-m-d');
$error = 0;

if(isset($_POST['sub1'])){
  $sql="SELECT * FROM Patient WHERE patientID = $_POST[patientID] AND approval=1";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  $sql = "SELECT * FROM Roster WHERE date='$_POST[date]'";
  $result = $conn->query($sql);
  $res = $result->fetch_assoc();

  $sql = "SELECT * FROM Employee WHERE employeeID = $res[doctorID]";
  $result = $conn->query($sql);
  $doc = $result->fetch_assoc();

}
if(isset($_POST['sub2'])){
  if(strlen($_POST['docID']) == 0 || strlen($_POST['time']) == 0 || strlen($_POST['patientName']) == 0){
    $error = 1;
  }else{
    $sql = "SELECT * FROM DoctorAppointments WHERE date = '$_POST[date]' AND time = '$_POST[time]'";
    $result = $conn->query($sql);
    $cnt = mysqli_num_rows($result);
    if ( 0===$cnt ) {
        $sql = "INSERT INTO DoctorAppointments (patientID,date,time,comment,morningMed,lunchMed,nightMed,attendance,doctorID)
        VALUE ($_POST[patientID],'$_POST[date]','$_POST[time]','','','','',0,$_POST[docID])";
        if ($conn->query($sql) === TRUE) {
            //echo "Updated";
            $error = 3;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else {
      $error = 2;
    }
  }

}
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

<h1 class="text-center">Doctor’s Appointment</h1>
<hr>

<div class="mb-5 mt-5 text-center">
<form action="appointment.php" method="POST" id="form1">
  <label for="patientID">Patient ID: </label>
  <input type="text" id="patientID" name="patientID" minlength="5" maxlength="5" required value=<?php if(isset($_POST['sub1']) || isset($_POST['sub2'])) echo $_POST['patientID'];?>>
  <br>
  <br>
  <label for="date">Date: </label>
  <input type="date" id="date" name="date" required value=<?php if(isset($_POST['sub1']) || isset($_POST['sub2'])) echo $_POST['date'];?>>
  <br>
  <input class="btn-info text-light rounded" type="submit" name="sub1" id="sub1" value="Submit">
</div>

<hr>
<?php
if($error == 1) echo "<p style='color:red'>All Fields Must Be Filled</p>";
if($error == 2) echo "<p style='color:red'>That Appointment Time and Date Are Already Taken</p>";
if($error == 3) echo "<p>Appointment Created</p>";

?>

<!-- NEED TO WORK ON THIS FORM BELOW -->
<div class="mb-5 mt-5 text-start">
  <label for="patientName">Patient Name: </label>
  <input readonly type="text" id="patientName" name="patientName" value=<?php if(isset($_POST['sub1'])) echo $row['fName'] . "_" . $row['lName'];if(isset($_POST['sub2'])) echo $_POST['patientName'];?>>
  <br>
  <br>

  <label for="doctor">Doctor: </label>
  <input readonly type="text" id="doctorName" name="doctorName" value=<?php if(isset($_POST['sub1'])) echo $doc['fName'] . "_" . $doc['lName']; if(isset($_POST['sub2'])) echo $_POST['doctorName'];?>>
  <input type="number" name="docID" id="docID" hidden value=<?php if(isset($_POST['sub1'])) echo $res['doctorID'];if(isset($_POST['sub2'])) echo $_POST['docID'];?>>

  <br>
  <br>
  <label for="time">Time: </label>
  <input type="time" name="time" id="time">

  <button class="w-100 btn btn-sm btn-info text-light mt-1 mb-1" id="sub2" name="sub2" type="submit" value="Submit" form="form1">Submit</button>
  <button class="w-100 btn btn-sm btn-secondary text-light mt-1 mb-1" type="input" form="form1">Cancel</button>
</form>
</div>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
