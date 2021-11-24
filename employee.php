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
          <option value="employeeID">Emp ID</option>
	        <option value="fName">Name</option>
	        <option value="role">Role</option>
          <option value="salary">Salary</option>
	        </select><br>
  <input type="submit" value="search" id="search">
</form>

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
  WHERE employeeID = $_POST[empID]";
  if ($conn->query($sql) === TRUE) {
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
</html>
