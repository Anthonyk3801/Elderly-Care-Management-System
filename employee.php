<?php
include 'db_connection.php';
?>
<html>
<head>
  <link rel="stylesheet" href="CSS/employeeStyle.css">
</head>
<form action="employee.php" method="POST" id="form2">
    <label for="empID">Emp ID</label>
    <input type="number" name="empID" id="empID" min="1"><br>

    <label for="salary">New Salary</label>
    <input type="number" name="salary" id="salary" min="1"><br>
    <input type="submit" value="submit" id="submit">
</form>
<form action="employee.php" method="POST" id="form1">
  Search: <input type="text" name="search"><br>
  Column: <select name="column">
          <option value="empID">Emp ID</option>
	        <option value="name">Name</option>
	        <option value="role">Role</option>
          <option value="salary">Salary</option>
	        </select><br>
  <input type="submit" value="search" id="search">
</form>
</html>
<?php
$search = $_POST['search'];
$column = $_POST['column'];
$sql = "SELECT *
FROM Employee
WHERE $column LIKE '%$search%'";
$result = $conn->query($sql);

if(isset($_POST['empID'])){
    $empID = $_POST['empID'];
    $salary = $_POST['salary'];
};
if (isset($_POST['empID'])){
  $sql = "UPDATE Employee salary
  SET salary='salary'";
}
?>
