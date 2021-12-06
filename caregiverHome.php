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
        echo "Update Successful.";
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
                echo "New record created successfully <br>";
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

<h1>Caregiver's Home</h1>
<hr>
<br>

        <form action="caregiverHome.php" id="form1" method="post">
          <table width=30% border=1>
            <tr>
              <th>Patient Name</th>
              <th>Breakfast</th>
              <th>Morning Med</th>
              <th>Lunch</th>
              <th>Lunch Med</th>
              <th>Dinner</th>
              <th>Night Med</th>
            </tr>

            <?php

            while($res = mysqli_fetch_array($result)) {
                $sql="SELECT * FROM DoctorAppointments WHERE patientID = $res[patientID] ORDER BY date DESC LIMIT 1";
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
                    <td><button type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' breakfast'?>">O</button></td>
                <?php
                }else{
                    echo "<td>&#10004;</td>";
                }
                if($res['morningMedCheck'] == 0){
                    ?>
                    <td><button type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' morningMedCheck'?>"><?php echo $morn?></button></td>
                <?php
                }else{
                    echo "<td>" . $morn . " " . "&#10004;</td>";
                }
                if($res['lunch'] == 0){
                    ?>
                    <td><button type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' lunch'?>">O</button></td>
                <?php
                }else{
                    echo "<td>&#10004;</td>";
                }
                if($res['lunchMedCheck'] == 0){
                    ?>
                    <td><button type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' lunchMedCheck'?>"><?php echo $lunch?></button></td>
                <?php
                }else{
                    echo "<td>" . $lunch . " " . "&#10004;</td>";
                }
                if($res['dinner'] == 0){
                    ?>
                    <td><button type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' dinner'?>">O</button></td>
                <?php
                }else{
                    echo "<td>&#10004;</td>";
                }
                if($res['nightMedCheck'] == 0){
                    ?>
                    <td><button type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' nightMedCheck'?>"><?php echo $night?></button></td>
                <?php
                }else{
                    echo "<td>" . $night . " " . "&#10004;</td>";
                }
            }
            ?>
     </table>
     </form>

     <?php // TEMPLATES
       include 'templates/end-main-content.html';
       include 'templates/footer.html';
     ?>
