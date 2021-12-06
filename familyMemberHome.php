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
    echo "Family Member Home <br>";
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
    //include 'templates/alert-message-before-login.html';
    include 'templates/nav-bar.html';
    include 'templates/main-grid-content-1column.html';
    //include 'templates/main-grid-content-2columns.html';
    //include 'templates/side-bar.html';
    //include 'templates/side-bar-hidden.html';
    include 'templates/main-content.html';
    //include 'templates/end-main-content.html';
    //include 'templates/footer.html';
?>
<!-- <link rel="stylesheet" href="CSS/patientStyles.css"> -->

<h1>Family Member’s Home</h1>
<hr>
<br>

        <form action="familyMemberHome.php" method="post">
            <label for="familyCode">Family Code: </label>
            <input type="number" name="familyCode" id="familyCode" max=999 required value=<?php echo (isset($_POST['search'])) ? $_POST['familyCode']:"";?>>

            <label for="patientID">Patient ID: </label>
            <input type="number" name="patientID" id="patientID" max=99999 required value=<?php echo (isset($_POST['search'])) ? $_POST['patientID']:"";?>>

            <label for="date">Date: </label>
            <input type="date" name="date" id="date" required value=<?php if(isset($_POST['search'])) echo $_POST['date'];?>>

            <input type="submit" name="search" id="search" value="SEARCH">
        </form>

        <table width='30%' border=0>
          <tr>
            <th>Patient Name</th>
            <th>Doctor Name</th>
            <th>Caregiver Name</th>
            <th>Doctor Appointment</th>
            <th>Breakfast</th>
            <th>Morning Med</th>
            <th>Lunch</th>
            <th>Lunch Med</th>
            <th>Dinner</th>
            <th>Night Med</th>
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
                        echo "<td> X </td>";
                    }elseif($checklist['breakfast'] == 1){
                        echo "<td> &#10004; </td>";
                    }
                    if($checklist['morningMedCheck'] == 0){
                        echo "<td> X </td>";
                    }elseif($checklist['morningMedCheck'] == 1){
                        echo "<td> &#10004; </td>";
                    }
                    if($checklist['lunch'] == 0){
                        echo "<td> X </td>";
                    }elseif($checklist['lunch'] == 1){
                        echo "<td> &#10004; </td>";
                    }
                    if($checklist['lunchMedCheck'] == 0){
                        echo "<td> X </td>";
                    }elseif($checklist['lunchMedCheck'] == 1){
                        echo "<td> &#10004; </td>";
                    }
                    if($checklist['dinner'] == 0){
                        echo "<td> X </td>";
                    }elseif($checklist['dinner'] == 1){
                        echo "<td> &#10004; </td>";
                    }
                    if($checklist['nightMedCheck'] == 0){
                        echo "<td> X </td>";
                    }elseif($checklist['nightMedCheck'] == 1){
                        echo "<td> &#10004; </td>";
                    }

                };
                ?>
         </table>

<?php // TEMPLATES
include 'templates/end-main-content.html';
include 'templates/footer.html';
?>
