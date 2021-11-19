<?php
include 'db_connection.php';

$sql = "SELECT patientID,fName,lName,DOB,admissionDate,emergencyContactName,emergencyContactNumber,emergencyContactRelation 
FROM Patient
WHERE approval = 1;";

$result = $conn->query($sql);
?>
<html>
<head>
  <link rel="stylesheet" href="CSS/patientStyles.css">
</head>
    <body>
        <table width='30%' border=0>
                
                    <th>Patient ID</th>
                    <th>Name </th>
                    <th>Date of Birth </th>
                    <th>Admission Date</th>
                    <th>Emergency Contact</th>
                    <th>Contact Number</th>
                    <th>Contact Relation</th>
                    
                </tr>
                <?php 
            
                while($res = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$res['patientID']."</td>";
                    echo "<td>".$res['fName']. " " .$res['lName']."</td>";
                    echo "<td>".$res['DOB']."</td>";    
                    echo "<td>".$res['admissionDate']."</td>";
                    echo "<td>".$res['emergencyContactName']."</td>";
                    echo "<td>".$res['emergencyContactNumber']."</td>";
                    echo "<td>".$res['emergencyContactRelation']."</td>";
                            
                }
                ?>
         </table>
    </body>
</html>