<?php
include 'db_connection.php';

$sql = "SELECT fName,lName
FROM Patient
WHERE approval = 0;";

$presult = $conn->query($sql);

$sql = "SELECT fName,lName
FROM FamilyMember
WHERE approval = 0;";

$fresult = $conn->query($sql);

$sql = "SELECT fName,lName, role
FROM Employee
WHERE approval = 0;";

$eresult = $conn->query($sql);

?>
<html>
<head>
  <link rel="stylesheet" href="CSS/patientStyles.css">
</head>
    <body>
        <form action="approval.php" id="form1" method="POST">
        <table width='30%' border=0>
                
                    <th>Name</th>
                    <th>Role</th>
                    <th>Select</th>
                </tr>
                <?php 
            
                while($res = mysqli_fetch_array($presult)) {         
                    echo "<tr>";
                    echo "<td>" . $res['fName'] . " " . $res['lName'] . "</td>";
                    echo "<td>Patient</td>";
                    ?>
                    <td><button type="submit" name="check" form="form1" id="check" value="<?php echo $res['fName'] . ' ' . $res['lName'] . ' patient'?>">CHECK OUT</button></td>
                    <?php
                }
                while($res = mysqli_fetch_array($fresult)) {
                    echo "<tr>";
                    echo "<td>" . $res['fName'] . " " . $res['lName'] . "</td>";
                    echo "<td>Family Memeber</td>";
                    ?>
                    <td><button type="submit" name="check" form="form1" id="check" value="<?php echo $res['fName'] . ' ' . $res['lName'] . ' familymember'?>">CHECK OUT</button></td>
                    <?php
                }
                while($res = mysqli_fetch_array($eresult)) {         
                    echo "<tr>";
                    echo "<td>" . $res['fName'] . " " . $res['lName'] . "</td>";
                    echo "<td>" . $res['role'] . "</td>";  
                    ?>
                    <td><button type="submit" name="check" form="form1" id="check" value="<?php echo $res['fName'] . ' ' . $res['lName'] . ' ' . strtolower($res['role'])?>">CHECK OUT</button></td>
                    <?php
                }
                ?>
         </table>
         </form>
    </body>
</html>