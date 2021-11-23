<?php 

include 'db_connection.php';
?>

<?php
if(isset($_POST['sub'])){

  if($_POST['role2'] == 'Patient'){

    $sql = "INSERT INTO Patient (fName, lName, email, phone, password, DOB, familyCode, emergencyContactName, 
                                emergencyContactNum, emergencyContactRelation, patientID, groupID, 
                                admissionDate, approval, totalDues)
      VALUES ($_POST[fName], $_POST[lName], $_POST[email]', $_POST[phone], $_POST[password], $_POST[DOB], $_POST[familyCode], $_POST[emergencyContactName], 
      $_POST[emergencyContactNum], $_POST[emergencyContactRelations], '0', '0', '1900-01-01', 0, 0)";

    if ($conn->query($sql) === TRUE) {
      echo "Successful Entry";
    } else {
      echo "Error inserting record: " . $conn->error;
    }

  }elseif($_POST['role2'] == 'Family_Members'){

    $sql = "INSERT INTO Family_Members (fName, lName, email, phone, password, DOB, approval)
      VALUES ('$_POST[fName]', '$_POST[lName]', '$_POST[email]', '$_POST[phone]', '$_POST[password]', '$_POST[DOB]')";

  }else{

    $sql = "INSERT INTO Employees (fName, lName, email, phone, password, DOB, role, 
                                    employeeID, salary, approval)
      VALUES ('$_POST[fName]', '$_POST[lName]', '$_POST[email]', '$_POST[phone]', '$_POST[password]', '$_POST[DOB]', '$_POST[role2]')";
  }

}

?>

<html>
<head>
  <link rel="stylesheet" href="CSS/homeStyle.css">
</head>
<form action="login.php" method="POST" id="form1">
    <button type="submit" value="submit" id="login">Login</button>
</form>

<form action="register.php" method="POST" id="form2">
    <button type="submit" value="submit" id="register">Register</button>
</form>
</html>

