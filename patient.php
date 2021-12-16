<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 1 || $_SESSION['level'] != 2 || $_SESSION['level'] != 3 || $_SESSION['level'] != 4) header('location:extras/transfer.php');
};
*/
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
    <link rel="stylesheet" href="CSS/patient.css">
  </head>

  <h1 class="text-center">Patients</h1>
  <hr>

  <div class="mb-1 mt-5 text-center text-dark">
        <form action="patient.php" method="POST">
            <label for="option">Search Option: </label>
            <select class="text-center" name="option" id="option">
            <option value="id">Patient ID</option>
            <option value="name">Patient Name</option>
            <option value="dob">Patient DOB</option>
            <option value="admission">Patient Admission Date</option>
            </select>
            <br>
            <label for="search">Patient Search:</label>
            <input class="text-center" type="text" name="search" id="search" required>
            <br>
            <button class="w-25 btn btn-sm btn-info text-light mt-2 mb-1" type="submit" id="enter" value="Submit">Submit</button>
        </form>

        <form action="patient.php" method="POST">
          <button class="w-25 btn btn-sm btn-info text-light mt-0 mb-3" type="submit" id="cancel" value="All Patients">All Patients</button>
        </form>
        <p class="bg-light text-info text-start">Format dates: YYYY-MM-DD</p>
  </div>
<hr>
  <div class="text-center text-dark mt-5 mb-5 p-5">
    <table>
      <th>Patient ID</th>
      <th>Name </th>
      <th>Date of Birth </th>
      <th>Admission Date</th>
      <th>Emergency Contact</th>
      <th>Contact Number</th>
      <th>Contact Relation</th>

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
</div>

<?php // TEMPLATES
include 'templates/end-main-content.html';
include 'templates/footer.html';
?>
