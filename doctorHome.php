<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 3) header('location:extras/transfer.php');
};
if($_GET['error'] == 2) echo "You are not authorized for that page";
*/
include 'db_connection.php';
$date = date('Y-m-d');
?>

<?php //TEMPLATES
    include 'templates/header.html';
    //include 'templates/alert-message-before-login.html';
    include 'templates/nav-bar.html';
    include 'templates/main-grid-content-1column.html';
    //include 'templates/main-grid-content-2columns.html';
    //include 'templates/side-bar.html';
    //include 'templates/side-bar-hidden.html';
    include 'templates/main-content.html';
    //include 'templates/end-main-content.html';
    //include 'templates/footer.html';
?>

<h1>Doctor's Home</h1>
<hr>
<br>

<head>
  <link rel="stylesheet" href="CSS/doctorHomeStyle.css">
</head>

<form action="doctorHome.php" method="POST">
  <input type="submit" value="Old Appointment" name="search">
</form>

<?php
if(isset($_POST['search'])){
$search = $_POST['search'];
$sql = "SELECT *, Patient.fName, Patient.lName
FROM DoctorAppointments
INNER JOIN Patient
WHERE Patient.patientID = DoctorAppointments.patientID AND date < '$date'";
$result = $conn->query($sql);
$res = $result->fetch_assoc();
?>

<table>

            <th> </th>
            <th>Patient Name</th>
            <th>Date</th>
            <th>Comment</th>
            <th>Morning Med </th>
            <th>Afternoon Med</th>
            <th>Night Med</th>

        </tr>

<?php
    while($res = mysqli_fetch_array($result)) {
    echo "<tr>";
    ?>
    <td><form method="get" action="patientDoctor.php">
    <button type="submit">Continue</button>
</form></td>
    <?php
    echo "<td>".$res['fName']. " " .$res['lName']."</td>";
     if(isset($res['date'])){
        echo "<td> Appointment Date: " . $res['date'] . " </td>";
    }else{
        echo "<td> No Appointment </td>";
    }
    echo "<td>".$res['comment']."</td>";
    echo "<td>".$res['morningMed']."</td>";
    echo "<td>".$res['lunchMed']."</td>";
    echo "<td>".$res['nightMed']."</td>";

  }
}
?>
</table>


<form action="doctorHome.php" method="POST">
  <input type="submit" value="New Appointment" name="submit">
</form>

<?php
if(isset($_POST['submit'])){
$submit = $_POST['submit'];
$sql = "SELECT *, Patient.fName, Patient.lName
FROM DoctorAppointments
INNER JOIN Patient
WHERE Patient.patientID = DoctorAppointments.patientID AND date >= '$date'";
$result = $conn->query($sql);

?>
<table>

            <th>Patient Name</th>
            <th>Date</th>

        </tr>
<?php
    while($res = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$res['fName']. " " .$res['lName']."</td>";
    if(isset($res['date'])){
       echo "<td> Appointment Date: " . $res['date'] . " </td>";
   }else{
       echo "<td> No Appointment </td>";
   }
  }
}
?>
</table>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
