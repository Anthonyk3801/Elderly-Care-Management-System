<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 1 || $_SESSION['level'] != 2) header('location:extras/transfer.php');
};
*/
include 'db_connection.php';

if(isset($_POST['accept'])){
    $arr = explode(' ', $_POST['accept']);
    $email = $arr[0];
    $table = $arr[1];

    $sql = "UPDATE $table
    SET approval = 1
    WHERE email = '$email';";


    if ($conn->query($sql) === TRUE) {
        echo "Registration Approved Successfully.";
      } else {
        echo "Error updating record: " . $conn->error;
      }
}elseif(isset($_POST['decline'])){
    $arr = explode(' ', $_POST['decline']);
    $email = $arr[0];
    $table = $arr[1];
    $sql = "DELETE FROM $table WHERE email='$email' ";

    if ($conn->query($sql) === TRUE) {
        echo "Registration Declined Successfully.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


$sql = "SELECT fName,lName, email
FROM Patient
WHERE approval = 0;";

$presult = $conn->query($sql);

$sql = "SELECT fName,lName, email
FROM FamilyMember
WHERE approval = 0;";

$fresult = $conn->query($sql);

$sql = "SELECT fName,lName, role, email
FROM Employee
WHERE approval = 0;";

$eresult = $conn->query($sql);

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
    <link rel="stylesheet" href="CSS/registrationApproval.css">
  </head>

  <h1 class="text-center">Registration Approval</h1>
  <hr>
  <div class="mb-3 mt-5">
        <form action="registrationApproval.php" id="form1" method="POST">
        <table class="text-center">
                <tr>
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
                    <td class="center"><button class="button bg-dark" type="submit" name="accept" form="form1" id="accept" value="<?php echo $res['email'] . ' Patient'?>">✅</button>
                    <button class="button bg-dark" type="submit" name="decline" form="form1" id="decline" value="<?php echo $res['email'] . ' Patient'?>">❌</button></td>
                    <?php
                }
                while($res = mysqli_fetch_array($fresult)) {
                    echo "<tr>";
                    echo "<td>" . $res['fName'] . " " . $res['lName'] . "</td>";
                    echo "<td>Family Member</td>";
                    ?>
                    <td class="center"><button class="button bg-dark" type="submit" name="accept" form="form1" id="accept" value="<?php echo $res['email'] . ' FamilyMember'?>">✅</button>
                    <button class="button bg-dark" type="submit" name="decline" form="form1" id="decline" value="<?php echo $res['email'] . ' FamilyMember'?>">❌</button></td>
                    <?php
                }
                while($res = mysqli_fetch_array($eresult)) {
                    echo "<tr>";
                    echo "<td>" . $res['fName'] . " " . $res['lName'] . "</td>";
                    echo "<td>" . $res['role'] . "</td>";
                    ?>
                    <td class="center"><button class="button bg-dark" type="submit" name="accept" form="form1" id="accept" value="<?php echo $res['email'] . ' Employee'?>">✅</button>
                    <button class="button bg-dark" type="submit" name="decline" form="form1" id="decline" value="<?php echo $res['email'] . ' Employee'?>">❌</button></td>
                    <?php
                }
                ?>

         </table>
         <!-- Commented Reset Button out.... -->
         <!-- <button class="btn btn-sm btn-secondary text-light mt-3 mb-3" type="reset">Cancel</button> -->
         </form>
</div>

<?php // TEMPLATES
include 'templates/end-main-content.html';
include 'templates/footer.html';
?>
