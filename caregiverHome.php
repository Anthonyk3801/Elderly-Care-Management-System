<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 4) header('location:extras/transfer.php');
};
if($_GET['error'] == 2) echo "You are not authorized for that page";
*/
include 'db_connection.php';

$date = date('Y-m-d');
$group = 0;

$sql = "SELECT * FROM Roster Where date = '$date';";
$result = $conn->query($sql);
$res = $result->fetch_assoc();
if($res['careGiver1'] == $_SESSION['id']) $group = 1;
if($res['careGiver2'] == $_SESSION['id']) $group = 2;
if($res['careGiver3'] == $_SESSION['id']) $group = 3;
if($res['careGiver4'] == $_SESSION['id']) $group = 4;

if(isset($_POST['change'])){
    $arr = explode(" ",$_POST['change']);
    $id = $arr[0];
    $column = $arr[1];

    $sql = "UPDATE PatientChecklist SET $column = 1 WHERE patientID = $id AND date = '$date';";

    if ($conn->query($sql) === TRUE) {
        //echo "Update Successful.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
};


$sql="Select * FROM PatientChecklist
    WHERE date = '$date';";

    $result = $conn->query($sql);

    $cnt = mysqli_num_rows($result);
    if ( 0===$cnt ) {
        $sql = "SELECT * FROM Patient WHERE approval = 1";
        $newresult = $conn->query($sql);
        while($res = mysqli_fetch_array($newresult)) {
            $sql = "Insert into PatientChecklist (patientID, date, morningMedCheck, lunchMedCheck, nightMedCheck, breakfast, lunch, dinner)
            Values ($res[patientID], '$date', 0, 0, 0, 0, 0, 0);";
            if ($conn->query($sql) === TRUE) {
                //echo "New record created successfully <br>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $sql="Select * FROM PatientChecklist pc INNER JOIN Patient p ON pc.patientID=p.patientID
        WHERE pc.date = '$date' AND p.groupID = $group;";

        $result = $conn->query($sql);

    }else {
        $sql="Select * FROM PatientChecklist pc INNER JOIN Patient p ON pc.patientID=p.patientID
        WHERE pc.date = '$date' AND p.groupID = $group;";

        $result = $conn->query($sql);
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
    <link rel="stylesheet" href="CSS/caregiver.css">
</head>

<h1 class="text-center">Caregiver's Home</h1>
<hr>
<div class="m-5 text-dark text-center">
  <h2 class="text-start mt-5 text-info">List of Patients duty today</h2>
        <form action="caregiverHome.php" id="form1" method="post">
          <table>
            <tr>
              <th class="p-2">Patient Name</th>
              <th class="p-2">Breakfast</th>
              <th class="p-2">Morning Med</th>
              <th class="p-2">Lunch</th>
              <th class="p-2">Lunch Med</th>
              <th class="p-2">Dinner</th>
              <th class="p-2">Night Med</th>
            </tr>
            <?php

            while($res = mysqli_fetch_array($result)) {
                $sql="SELECT * FROM DoctorAppointments WHERE patientID = $res[patientID] AND attendance = 1 ORDER BY date DESC LIMIT 1";
                $newresult = $conn->query($sql);
                $row = $newresult->fetch_assoc();
                $morn = strtoupper($row['morningMed']);
                $lunch = strtoupper($row['lunchMed']);
                $night = strtoupper($row['nightMed']);
                if(strlen($morn) == 0) {
                    $sql="UPDATE PatientChecklist SET morningMedCheck = 1 WHERE date='$date' AND patientID=$res[patientID];";
                    if ($conn->query($sql) === TRUE) {
                        //echo "Update Success<br>";
                        $morn = "NONE";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                };
                if(strlen($lunch) == 0) {
                    $sql="UPDATE PatientChecklist SET lunchMedCheck = 1 WHERE date='$date' AND patientID=$res[patientID];";
                    if ($conn->query($sql) === TRUE) {
                        //echo "Update Success<br>";
                        $lunch = "NONE";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                };
                if(strlen($night) == 0){
                    $sql="UPDATE PatientChecklist SET nightMedCheck = 1 WHERE date='$date' AND patientID=$res[patientID];";
                    if ($conn->query($sql) === TRUE) {
                        //echo "Update Success<br>";
                        $night = "NONE";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                };

                echo "<tr>";
                echo "<td>".$res['fName']. " " . $res['lName'] . "</td>";
                if($res['breakfast'] == 0){
                    ?>
                    <td  class='center'><button class="button" type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' breakfast'?>">O</button></td>
                <?php
                }else{
                    echo "<td  class='center'>&#10004;</td>";
                }
                if($res['morningMedCheck'] == 0){
                    ?>
                    <td><button class="button" type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' morningMedCheck'?>"><?php echo $morn?></button></td>
                <?php
                }else{
                    echo "<td>" . $morn . " " . "&#10004;</td>";
                }
                if($res['lunch'] == 0){
                    ?>
                    <td class='center'><button class="button" type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' lunch'?>">O</button></td>
                <?php
                }else{
                    echo "<td class='center'>&#10004;</td>";
                }
                if($res['lunchMedCheck'] == 0){
                    ?>
                    <td><button class="button" type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' lunchMedCheck'?>"><?php echo $lunch?></button></td>
                <?php
                }else{
                    echo "<td>" . $lunch . " " . "&#10004;</td>";
                }
                if($res['dinner'] == 0){
                    ?>
                    <td  class='center'><button class="button" type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' dinner'?>">O</button></td>
                <?php
                }else{
                    echo "<td  class='center'>&#10004;</td>";
                }
                if($res['nightMedCheck'] == 0){
                    ?>
                    <td><button class="button" type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' nightMedCheck'?>"><?php echo $night?></button></td>
                <?php
                }else{
                    echo "<td>" . $night . " " . "&#10004;</td>";
                }
            }
            ?>
     </table>

     <!-- Change value/id of the button below | buttons no-needed
     <button class="p-2 w-25 btn btn-sm btn-info text-light mt-5 mb-1" type="submit" value="Submit">Submit</button>
     <button class="p-2 w-25 btn btn-sm btn-secondary text-light mt-5 mb-1" type="reset">Cancel</button>
     -->

     </form>
</div>

<?php // TEMPLATES
include 'templates/end-main-content.html';
include 'templates/footer.html';
?>
