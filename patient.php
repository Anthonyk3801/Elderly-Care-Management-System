<?php
include 'db_connection.php';
if(!isset($_POST['option'])){
    $sql = "SELECT patientID,fName,lName,DOB,admissionDate,emergencyContactName,emergencyContactNumber,emergencyContactRelation 
    FROM Patient
    WHERE approval = 1;";

    $result = $conn->query($sql);
}
if(isset($_POST['option'])){
    if($_POST['option'] == 'id'){
        $sql = "SELECT patientID,fName,lName,DOB,admissionDate,emergencyContactName,emergencyContactNumber,emergencyContactRelation 
        FROM Patient
        WHERE approval = 1 AND patientID = $_POST[search];";

        $result = $conn->query($sql);
    }elseif($_POST['option'] == 'name'){
        if(str_contains($_POST['search'],' ')){
            $arr = explode(" ", $_POST['search']);
            $fname = $arr[0];
            $lname = $arr[1];
            $fname = strtoupper($fname);
            $lname = strtoupper($lname);
            echo $fname . " " . $lname;

            $sql = "SELECT patientID,fName,lName,DOB,admissionDate,emergencyContactName,emergencyContactNumber,emergencyContactRelation 
                    FROM Patient
                    WHERE approval = 1 AND upper(fName) = '$fname' AND upper(lName) = '$lname';";

            $result = $conn->query($sql);
        }else{
            $fname = $_POST['search'];
            $fname = strtoupper($fname);
            $sql = "SELECT patientID,fName,lName,DOB,admissionDate,emergencyContactName,emergencyContactNumber,emergencyContactRelation 
                    FROM Patient
                    WHERE approval = 1 AND upper(fName) = '$fname';";

            $result = $conn->query($sql);
        }
        
        
    }elseif($_POST['option'] == 'dob'){
        $sql = "SELECT patientID,fName,lName,DOB,admissionDate,emergencyContactName,emergencyContactNumber,emergencyContactRelation 
        FROM Patient
        WHERE approval = 1 AND DOB = '$_POST[search]';";

        $result = $conn->query($sql);
    }elseif($_POST['option'] == 'admission'){
        $sql = "SELECT patientID,fName,lName,DOB,admissionDate,emergencyContactName,emergencyContactNumber,emergencyContactRelation 
        FROM Patient
        WHERE approval = 1 AND admissionDate = '$_POST[search]';";

        $result = $conn->query($sql);
    }
    if(isset($_POST['cancel'])){
        $sql = "SELECT patientID,fName,lName,DOB,admissionDate,emergencyContactName,emergencyContactNumber,emergencyContactRelation 
        FROM Patient
        WHERE approval = 1;";

        $result = $conn->query($sql);
    }
}

?>
<html>
<head>
  <link rel="stylesheet" href="CSS/patientStyles.css">
</head>
    <body>
        <form action="patient.php" method="POST">
            <label for="option">Search Option: </label>
            <select name="option" id="option">

            <option value="id">Patient ID</option>
            <option value="name">Patient Name</option>
            <option value="dob">Patient DOB</option>
            <option value="admission">Patient Admission Date</option>
            </select>


            <label for="search">Patient Search:</label>
            <input type="text" name="search" id="search" required>

            <input type="submit" id="enter" value="Submit">
        </form>
        
        <p>Format dates: YYYY-MM-DD</p>

        <form action="patient.php" method="POST">
            <input type="submit" id="cancel" value="All Patients">
        </form>


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