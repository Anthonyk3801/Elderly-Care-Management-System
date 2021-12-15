<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 1) header('location:extras/transfer.php');
};
*/
include 'db_connection.php';
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

<h1 class="text-center">Employees</h1>
<hr>

<div class="mb-5 mt-5 text-center">
<form action="employee.php" method="POST" id="form2">
    <label for="empID">Emp ID</label>
    <input type="number" name="empID" id="empID" min="1">
    <label for="salary">New Salary</label>
    <input type="number" name="salary" id="salary" min="1" />
    <button class="w-50 btn btn-sm btn-info text-light mt-5 mb-1" type="submit" value="submit" id="submit">Submit</button>
    <button class="w-50 btn btn-sm btn-secondary text-light mt-1 mb-1" type="reset">Cancel</button>
</form>
</div>
<hr>
<div class="mb-5 mt-5 text-start">
<form action="employee.php" method="POST" id="form1">
  <label for="search">Search: </label>
  <input type="text" name="search"><br>
  <label for="column">Column: </label>
  <select name="column">
          <option value="employeeID">Emp ID</option>
	        <option value="fName">Name</option>
	        <option value="role">Role</option>
          <option value="salary">Salary</option>
	        </select><br>
  <button class="w-25 btn btn-sm btn-info text-light mt-5 mb-1" type="submit" value="search" id="search">Search</button>
</form>
</div>

<?php
if(isset($_POST['search'])){
$search = $_POST['search'];
$column = $_POST['column'];
$sql = "SELECT *
FROM Employee
WHERE $column = '$search' AND approval = 1";
$result = $conn->query($sql);

echo "<table width='30%' border=0>";

            echo "<th>ID</th>";
            echo "<th>Name </th>";
            echo "<th>Role</th>";
            echo "<th>Salary</th>";

        echo "</tr>";

while($res = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$res['employeeID']."</td>";
    echo "<td>".$res['fName']. " " .$res['lName']."</td>";
    echo "<td>".$res['role']."</td>";
    echo "<td>".$res['salary']."</td>";

}

echo "</table>";
}

if(isset($_POST['empID'])){
    $empID = $_POST['empID'];
    $salary = $_POST['salary'];
};
if (isset($_POST['empID'])){
  $sql = "UPDATE Employee
  SET salary=$_POST[salary]
  WHERE employeeID = $_POST[empID] AND NOT role = 'SuperVisor'";
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
