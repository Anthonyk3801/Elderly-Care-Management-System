<?php
session_start();
include 'db_connection.php';

/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 1 || $_SESSION['level'] != 2) header('location:extras/transfer.php');
};
*/
//Getting all supervisors
$sql = "SELECT * FROM Employee WHERE lower(role) = 'supervisor' AND approval = 1;";
$sresult = $conn->query($sql);

//Getting all doctors
$sql = "SELECT * FROM Employee WHERE lower(role) = 'doctor' AND approval = 1;";
$dresult = $conn->query($sql);

//Getting all caregivers
$sql = "SELECT * FROM Employee WHERE lower(role) = 'caregiver' AND approval = 1;";
$cresult = $conn->query($sql);

$check = 1;
$created = 0;
if(isset($_POST['create'])){
  $arr = array($_POST['supervisor'],$_POST['doctor'],$_POST['caregiver1'],$_POST['caregiver2'],$_POST['caregiver3'],$_POST['caregiver4']);
  $arr = array_unique($arr);
  if(count($arr) < 6) $check = 2;
  
  foreach($arr as $person){
   if($person == 'nothing') $check = 0;
  }
  

  if($check == 1){
    $sql = "DELETE FROM Roster WHERE date='$_POST[date]'";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "INSERT INTO Roster (date,supervisorID,doctorID,careGiver1,careGiver2,careGiver3,careGiver4,groupID)
    VALUE ('$_POST[date]',$_POST[supervisor],$_POST[doctor],$_POST[caregiver1],$_POST[caregiver2],$_POST[caregiver3],$_POST[caregiver4],5)";
    if ($conn->query($sql) === TRUE) {
      $created = 1;
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

<h1>New Roster</h1>
<hr>
<br>
<?php
if(isset($_POST['ok']) || isset($_POST['create']) && $created == 0){
  $sql = "SELECT * FROM Roster WHERE date = '$_POST[date]'";
  $result = $conn->query($sql);

  $cnt = mysqli_num_rows($result);
  if ( 0===$cnt ) {
      
  }else {
      echo "<p style='color:red;'>Warning: There is already a roster for that day. Creating a roster will update the previous one.</p>";
    
  }
}
if($check == 0) echo "All Fields are Required";
if($check == 2) echo "All Fields Must Be Different";
if($created == 1) echo "New Roster was Created!";

?>
<head>
  <link rel="stylesheet" href="CSS/newRoster.css">
</head>
<form action="newRoster.php" method="post">
  <label for="date">Date: </label>
  <input type="date" name="date" id="date" value=<?php if(isset($_POST['ok']) || isset($_POST['create']))echo $_POST['date'];?>>
  <input type="submit" name="ok" id="ok" value="OK">
  <div class="formcss">
    <label for="supervisor">Supervisor: </label>
    <select name="supervisor" id="supervisor">
        <option value="nothing">---</option>
        <?php
        while($res = mysqli_fetch_array($sresult)) {
        ?>
              <option value="<?php echo $res['employeeID'];?>"><?php echo $res['fName'] . " " . $res['lName'];?></option>;
        <?php
        }
        ?>
    </select>

    <label for="doctor">Doctor: </label>
    <select name="doctor" id="doctor">
        <option value="nothing">---</option>
        <?php
        while($res = mysqli_fetch_array($dresult)) {
        ?>
              <option value="<?php echo $res['employeeID'];?>"><?php echo $res['fName'] . " " . $res['lName'];?></option>;
        <?php
        }
        ?>
    </select>

    <label for="caregiver1">Caregiver 1: </label>
    <select name="caregiver1" id="caregiver1">
        <option value="nothing">---</option>
        <?php
        //Getting all caregivers
        $sql = "SELECT * FROM Employee WHERE lower(role) = 'caregiver' AND approval = 1;";
        $cresult = $conn->query($sql);
        while($res = mysqli_fetch_array($cresult)) {
        ?>
              <option value="<?php echo $res['employeeID'];?>"><?php echo $res['fName'] . " " . $res['lName'];?></option>;
        <?php
        }
        ?>
    </select>
  </div>

  <div class="formcss">
    <label for="caregiver2">Caregiver 2: </label>
    <select name="caregiver2" id="caregiver2">
        <option value="nothing">---</option>
        <?php
        //Getting all caregivers
        $sql = "SELECT * FROM Employee WHERE lower(role) = 'caregiver' AND approval = 1;";
        $cresult = $conn->query($sql);
        while($res = mysqli_fetch_array($cresult)) {
        ?>
              <option value="<?php echo $res['employeeID'];?>"><?php echo $res['fName'] . " " . $res['lName'];?></option>;
        <?php
        }
        ?>
    </select>

    <label for="caregiver3">Caregiver 3: </label>
    <select name="caregiver3" id="caregiver3">
        <option value="nothing">---</option>
        <?php
        //Getting all caregivers
        $sql = "SELECT * FROM Employee WHERE lower(role) = 'caregiver' AND approval = 1;";
        $cresult = $conn->query($sql);
        while($res = mysqli_fetch_array($cresult)) {
        ?>
              <option value="<?php echo $res['employeeID'];?>"><?php echo $res['fName'] . " " . $res['lName'];?></option>;
        <?php
        }
        ?>
    </select>

    <label for="caregiver4">Caregiver 4: </label>
    <select name="caregiver4" id="caregiver4">
        <option value="nothing">---</option>
        <?php
        //Getting all caregivers
        $sql = "SELECT * FROM Employee WHERE lower(role) = 'caregiver' AND approval = 1;";
        $cresult = $conn->query($sql);
        while($res = mysqli_fetch_array($cresult)) {
        ?>
              <option value="<?php echo $res['employeeID'];?>"><?php echo $res['fName'] . " " . $res['lName'];?></option>;
        <?php
        }
        ?>
    </select>
  </div>

  <input class="submity" type="submit" name="create" id="create" value="CREATE">





</form>


<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
