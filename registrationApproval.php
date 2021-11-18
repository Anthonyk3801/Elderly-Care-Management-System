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
        <table width='30%' border=0>
                
                    <th>Name</th>
                    <th>Role</th>
                </tr>
                <?php 
            
                while($res = mysqli_fetch_array($presult)) {         
                    echo "<tr>";
                    echo "<td>" . $res['fName'] . " " . $res['lName'] . "</td>";
                    echo "<td>Patient</td>";  
                }
                while($res = mysqli_fetch_array($fresult)) {         
                    echo "<tr>";
                    echo "<td>" . $res['fName'] . " " . $res['lName'] . "</td>";
                    echo "<td>Family Memeber</td>";  
                }
                while($res = mysqli_fetch_array($eresult)) {         
                    echo "<tr>";
                    echo "<td>" . $res['fName'] . " " . $res['lName'] . "</td>";
                    echo "<td>" . $res['role'] . "</td>";  
                }
                ?>
         </table>
    </body>
</html>