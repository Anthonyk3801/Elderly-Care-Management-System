<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 1) header('location:extras/transfer.php');
};
*/
include 'db_connection.php';
$new = 0;
$date = date('Y-m-d');
if(isset($_POST['update'])){
    $sql="SELECT * FROM Patient WHERE patientID = $_POST[patient] AND approval = 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $dues = $row['totalDues'];
    $lastDate = $row['lastUpdate'];
    if($lastDate != $date){
        $sql = "SELECT * FROM DoctorAppointments WHERE patientID = $_POST[patient] AND date <= '$date' AND date >= '$lastDate'";
        $result = $conn->query($sql);
        $cnt = mysqli_num_rows($result);
        if ( $cnt > 0 ) {
            $dues += (50 * $cnt);
        }
        $date1 = new DateTime($date);
        $date2 = new DateTime($lastDate);
        $interval = $date1->diff($date2);
        $dues += (10 * $interval->days);

        //Working on getting the dues to show the medications then updating Patients Table
    }

}
if(isset($_POST['submit'])){
    $sql="SELECT * FROM Patient WHERE patientID = $_POST[patient] AND approval = 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $amount = $row['totalDues'];
    $new = $amount - $_POST['payment'];

    if($new >= 0){
        $sql = "UPDATE Patient SET totalDues = $new WHERE patientID = $_POST[patient]";
        if ($conn->query($sql) === TRUE) {
            echo "Updated";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
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

<h1>Payments</h1>
<hr>
<br>

<form action="payment.php" method="post">
    <label for="patient">Patient ID: </label>
    <input type="number" name="patient" id="patient" required value=<?php if(isset($_POST['update']) || isset($_POST['submit'])) echo $_POST['patient'];?>>
    <input type="submit" name="update" id="update" value="UPDATE">
<?php
    if(isset($_POST['patient'])){
        $sql="SELECT * FROM Patient WHERE patientID = $_POST[patient] AND approval = 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo "<p>Patient Name: " . $row['fName'] . " " . $row['lName'] . "</p>";
        echo "<p>Amount Due: $" . $row['totalDues'] . "</p>";

    }
    ?>
    <label for="payment">New Payment: </label>
    <input type="number" name="payment" id="payment">
    <?php
        if($new < 0){
            echo "<p style='color:red'>Payment will not be proccessed due to over payment</p>";
        }
    ?>
    <input type="submit" name="submit" id="submit" value="SUBMIT">
</form>

<?php // TEMPLATES
include 'templates/end-main-content.html';
include 'templates/footer.html';
?>
