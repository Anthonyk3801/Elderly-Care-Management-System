<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 4) header('location:extras/transfer.php');
};
if($_GET['error'] == 2) echo "You are not authorized for that page";
*/
include 'db_connection.php';

echo "Caregiver Home <br>";

$date = date('Y-m-d');

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
        WHERE pc.date = '$date';";

        $result = $conn->query($sql);
        
    }else {
        $sql="Select * FROM PatientChecklist pc INNER JOIN Patient p ON pc.patientID=p.patientID
        WHERE pc.date = '$date';";

        $result = $conn->query($sql);
    }
?>

<html>
    <head>
        <link rel="stylesheet" href="CSS/patientStyles.css">
    </head>
    <body>
        <form action="caregiverHome.php" id="form1" method="post">
    <table width='30%' border=0>
                
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
                    <td><button type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' morningMedCheck'?>">O</button></td>
                <?php
                }else{
                    echo "<td>&#10004;</td>";
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
                    <td><button type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' lunchMedCheck'?>">O</button></td>
                <?php
                }else{
                    echo "<td>&#10004;</td>";
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
                    <td><button type="submit" name="change" form="form1" id="change" value="<?php echo $res['patientID'] . ' nightMedCheck'?>">O</button></td>
                <?php
                }else{
                    echo "<td>&#10004;</td>";
                }    
            }
            ?>
     </table>
     </form>
    </body>
</html>