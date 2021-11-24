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
    <label for="search">Search Emp ID:</label>
    <input type="search" name="search" id="searchID">
    <input type="submit" value="search" id="search"><br>

    <label for="search">Search Name:</label>
    <input type="search" name="search" id="searchName">
    <input type="submit" value="search" id="search"><br>

    <label for="search">Search Role:</label>
    <input type="search" name="search" id="searchRole">
    <input type="submit" value="search" id="search"><br>

    <label for="search">Search Salary:</label>
    <input type="search" name="search" id="searchSalary">
    <input type="submit" value="search" id="search">
</form>
</html>
<?php
$search = $_POST['search'];
$sql = "SELECT *
FROM Employee
WHERE employeeID LIKE '%$search%'";
$result = $conn->query($sql);

$search = $_POST['search'];
$sql = "SELECT *
FROM Employee
WHERE fname LIKE '%$search%' OR lName LIKE '%$search%'";
$result = $conn->query($sql);

$search = $_POST['search'];
$sql = "SELECT *
FROM Employee
WHERE role LIKE '%$search%'";
$result = $conn->query($sql);

$search = $_POST['search'];
$sql = "SELECT *
FROM Employee
WHERE salary LIKE '%$search%'";
$result = $conn->query($sql);

if(isset($_POST['empID'])){
    $empID = $_POST['empID'];
    $salary = $_POST['salary'];
};
if (isset($_POST['empID'])){
  $sql = "INSERT INTO Employee (employeeID, fName, lName, role, salary, email, phone, DOB, password, approval)
  VALUES ('$empID', '$fName', '$lName', '$role', '$salary', '$email', '$phone', '$DOB', '$password', '$approval')";
}
?>
