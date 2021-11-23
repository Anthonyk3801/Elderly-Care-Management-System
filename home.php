<?php

include 'db_connection.php';
?>

<?php
if(isset($_POST['sub'])){

  if($_POST['role2'] == 'Patient'){

    $sql = "INSERT INTO Patient (fName, lName, email, phone, password, DOB, familyCode, emergencyContactName,
                                emergencyContactNum, emergencyContactRelation, patientID, groupID,
                                admissionDate, approval, totalDues)
      VALUES ('$_POST[fName]', '$_POST[lName]', '$_POST[email]', '$_POST[phone]', '$_POST[password]', '$_POST[DOB]', $_POST[familyCode], '$_POST[emergencyContactName]',
      '$_POST[emergencyContactNum]', '$_POST[emergencyContactRelation]', '0', '0', '1900-01-01', 0, 0)";
      if ($conn->query($sql) === TRUE) {
          echo "Registeration Complete!";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }




  }elseif($_POST['role2'] == 'Family Member'){

    $sql = "INSERT INTO Family_Members (fName, lName, email, phone, password, DOB, approval)
      VALUES ('$_POST[fName]', '$_POST[lName]', '$_POST[email]', '$_POST[phone]', '$_POST[password]', '$_POST[DOB]', 0)";
      if ($conn->query($sql) === TRUE) {
          echo "Registeration Complete!";
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

  }else{

    $sql = "INSERT INTO Employees (fName, lName, email, phone, password, DOB, employeeID, role,
                                    salary, approval)
      VALUES ('$_POST[fName]', '$_POST[lName]', '$_POST[email]', '$_POST[phone]', '$_POST[password]', '$_POST[DOB]', 0, '$_POST[role2]',
              0, 0)";
              if ($conn->query($sql) === TRUE) {
                  echo "Registeration Complete!";
              } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
              }
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
