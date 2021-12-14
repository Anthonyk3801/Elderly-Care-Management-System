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
        $dues += (15 * $interval->m);

        $sql = "UPDATE Patient SET totalDues = $dues, lastUpdate = '$date' WHERE patientID = $_POST[patient]";
        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
            //echo "Updated";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
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
            //echo "Updated";
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

<h1 class="text-center pb-5">Payment</h1>
<hr>

<div class="mt-5 mb-5 text-dark text-center">
<form action="payment.php" method="post">
    <label for="patient">Patient ID: </label>
    <input class="text-center" type="number" name="patient" id="patient" required value=<?php if(isset($_POST['update']) || isset($_POST['submit'])) echo $_POST['patient'];?>>
    <button class="btn btn-sm btn-info text-light mt-0 mb-1" type="submit" name="update" id="update" value="UPDATE">Update</button>
    <button class="btn btn-sm btn-secondary text-light mt-0 mb-1" type="reset">Cancel</button>

<div class="mt-3 mb-3 bg-light text-info rounded text-center">
<?php
    if(isset($_POST['patient'])){
        $sql="SELECT * FROM Patient WHERE patientID = $_POST[patient] AND approval = 1";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        echo "<p>Patient Name: " . $row['fName'] . " " . $row['lName'] . "</p>";
        echo "<p>Amount Due: $" . $row['totalDues'] . "</p>";
    }
    ?>
</div>

  <div class="text-center">
    <label for="payment">New Payment: </label>
    <input class="text-center" type="number" name="payment" id="payment">
    <?php
        if($new < 0){
            echo "<p style='color:red'>Payment will not be proccessed due to over payment</p>";
        }
    ?>

    <button class="btn btn-sm btn-info text-light mt-0 mb-1" type="submit" name="submit" id="submit" value="SUBMIT">Submit</button>
 </div>
</form>
</div>

<div class="mt-5 mb-5 text-light bg-info w-50 text-start rounded">
  <ul>
    <li>$10 for every day.</li>
    <li>$50 for every appointment.</li>
    <li>$5 for every medicine/month.</li>
  </ul>
</div>

<?php // TEMPLATES
include 'templates/end-main-content.html';
include 'templates/footer.html';
?>
