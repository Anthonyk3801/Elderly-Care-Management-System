<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 6) header('location:extras/transfer.php');
};
if($_GET['error'] == 2) echo "You are not authorized for that page";
*/
include 'db_connection.php';
    $caregiver = "";
    $doctor = "";
    if(isset($_POST['search'])) {
        $sql = "SELECT * FROM PatientChecklist WHERE date='$_POST[date]' AND patientID=$_POST[patientID];";
        $result = $conn->query($sql);
        $cnt = mysqli_num_rows($result);
    if ( 0===$cnt ) {
        echo "<p style='color:red;'>Wrong PatientID or Family Code</p>";
    }else {
        $checklist = $result->fetch_assoc();

        $sql = "SELECT * FROM Patient WHERE patientID=$_POST[patientID]";
        $result = $conn->query($sql);
        $patient = $result->fetch_assoc();
        $group = $patient['groupID'];

        $sql = "SELECT * FROM Roster WHERE date='$_POST[date]'";
        $result = $conn->query($sql);
        $roster = $result->fetch_assoc();
        if($group == 1) $careID = $roster['careGiver1'];
        if($group == 2) $careID = $roster['careGiver2'];
        if($group == 3) $careID = $roster['careGiver3'];
        if($group == 4) $careID = $roster['careGiver4'];
        $doctorID = $roster['doctorID'];

        $sql = "SELECT * FROM Employee WHERE employeeID = $doctorID";
        $result = $conn->query($sql);
        $employee = $result->fetch_assoc();
        $doctor = $employee['fName'] . " " . $employee['lName'];

        $sql = "SELECT * FROM Employee WHERE employeeID = $careID";
        $result = $conn->query($sql);
        $employee2 = $result->fetch_assoc();
        $caregiver = $employee2['fName'] . " " . $employee2['lName'];

        $sql = "SELECT * FROM DoctorAppointments WHERE patientID = $_POST[patientID] AND date = '$_POST[date]'";
        $result = $conn->query($sql);
        $appoint = $result->fetch_assoc();
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
<!-- <link rel="stylesheet" href="CSS/patientStyles.css"> -->
<head>
    <link rel="stylesheet" href="CSS/familyMemberHome.css">
</head>

<h1 class="text-center pb-5">Family Member’s Home</h1>
<hr>

<div class="m-5 p-5 text-dark text-center p-5">
        <form action="familyMemberHome.php" method="post">

            <label for="familyCode">Family Code: </label>
            <input class="text-center" type="number" name="familyCode" id="familyCode" max=999 required value=<?php echo (isset($_POST['search'])) ? $_POST['familyCode']:"";?>>

            <label for="patientID">Patient ID: </label>
            <input class="text-center" type="number" name="patientID" id="patientID" max=99999 required value=<?php echo (isset($_POST['search'])) ? $_POST['patientID']:"";?>>

            <label for="date">Date: </label>
            <input class="text-end" type="date" name="date" id="date" required value=<?php if(isset($_POST['search'])) echo $_POST['date'];?>>

            <button class="btn btn-sm btn-info text-light mt-0 mb-1" type="submit" name="search" id="search" value="SEARCH">Search</button>
            <button class="btn btn-sm btn-secondary text-light mt-0 mb-1" type="reset">Cancel</button>

        </form>
</div>

<div class="m-5 p-5 text-dark text-center">
        <table>
          <tr>
            <th class="p-3">Patient Name</th>
            <th class="p-3">Doctor Name</th>
            <th class="p-3">Caregiver Name</th>
            <th class="p-3">Doctor Appointment</th>
            <th class="p-3">Breakfast</th>
            <th class="p-3">Morning Med</th>
            <th class="p-3">Lunch</th>
            <th class="p-3">Lunch Med</th>
            <th class="p-3">Dinner</th>
            <th class="p-3">Night Med</th>
          </tr>

                <?php
                if(isset($_POST['search'])){
                    echo "<tr>";
                    echo "<td> " . $patient['fName'] . " " . $patient['lName'] . " </td>";
                    echo "<td> $doctor </td>";
                    echo "<td> $caregiver </td>";
                    if(isset($appoint['time'])){
                        echo "<td> Appointment Time: " . $appoint['time'] . " </td>";
                    }else{
                        echo "<td> No Appointment </td>";
                    }
                    if($checklist['breakfast'] == 0){
                        echo "<td class='center'> X </td>";
                    }elseif($checklist['breakfast'] == 1){
                        echo "<td class='center'> &#10004; </td>";
                    }
                    if($checklist['morningMedCheck'] == 0){
                        echo "<td class='center'> X </td>";
                    }elseif($checklist['morningMedCheck'] == 1){
                        echo "<td class='center'> &#10004; </td>";
                    }
                    if($checklist['lunch'] == 0){
                        echo "<td class='center'> X </td>";
                    }elseif($checklist['lunch'] == 1){
                        echo "<td class='center'> &#10004; </td>";
                    }
                    if($checklist['lunchMedCheck'] == 0){
                        echo "<td class='center'> X </td>";
                    }elseif($checklist['lunchMedCheck'] == 1){
                        echo "<td class='center'> &#10004; </td>";
                    }
                    if($checklist['dinner'] == 0){
                        echo "<td class='center'> X </td>";
                    }elseif($checklist['dinner'] == 1){
                        echo "<td class='center'> &#10004; </td>";
                    }
                    if($checklist['nightMedCheck'] == 0){
                        echo "<td class='center'> X </td>";
                    }elseif($checklist['nightMedCheck'] == 1){
                        echo "<td class='center'> &#10004; </td>";
                    }

                };
                ?>
         </table>
</div>

<?php // TEMPLATES
include 'templates/end-main-content.html';
include 'templates/footer.html';
?>
