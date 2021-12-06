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

<?php //TEMPLATES
    include 'templates/header.html';
    include 'templates/alert-message-before-login.html';
    include 'templates/nav-bar.html';
    //include 'templates/main-grid-content-1column.html';
    include 'templates/main-grid-content-2columns.html';
    include 'templates/side-bar.html';
    //include 'templates/side-bar-hidden.html';
    include 'templates/main-content.html';
    //include 'templates/end-main-content.html';
    //include 'templates/footer.html';
?>

        <h1>ElderlyCare Management System</h1>
        <br>
        <hr>

        <h2>General info</h1>
          <br>
        <h3>CSET 220 - Software Project III</h2>

        <p>The goal of this project is to emulate a
        real-world agency process to plan, design,
        and build a working web application
        according to client specifications and
        employer defined workflows. It will utilize
        everything we've learned this year.</p>

        <h4>The Schedule</h3>
        <p>This is a five-week project. Each week will
        start with a planning day to prep a week's
        worth of stories and review the previous
        week's deployment.</p>
        <hr>
        <h3>Technologies</h2>
        <ul>
          <li>HTML5</li>
          <li>CSS3</li>
          <li>JavaScript</li>
          <li>PHP</li>
          <li>phpMyAdmin</li>
          <li>MySQL</li>
          <li>Agile Process</li>
          <li>Feature Branch Git Workflow</li>
        </ul>
        <hr>
        <h3>Collaborators</h2>
        <ul>
          <li>Hari Allen</li>
          <li>Anthony Keller</li>
          <li>Jody Winters</li>
          <li>Julio Pochet Edmead</li>
        </ul>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
