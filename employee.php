<?php
include 'db_connection.php';
?>
<form action="employee.php" method="POST">
    <label for="search">Search Emp ID:</label>
    <input type="search" name="search" id="searchID">
    <input type="submit" value="search"><br>

    <label for="search">Search Name:</label>
    <input type="search" name="search" id="searchName">
    <input type="submit" value="search"><br>

    <label for="search">Search Role:</label>
    <input type="search" name="search" id="searchRole">
    <input type="submit" value="search"><br>

    <label for="search">Search Salary:</label>
    <input type="search" name="search" id="searchSalary">
    <input type="submit" value="search">
</form>

<form action="employee.php" method="POST">
    <label for="empID">Emp ID</label>
    <input type="number" name="empID" id="empID" min="1">

    <label for="salary">New Salary</label>
    <input type="number" name="salary" id="salary" min="1">
    <input type="submit" value="submit">
</form>
<?php
if(isset($_POST['empID'])){
    $empID = $_POST['empID'];
    $salary = $_POST['salary'];
};
if (isset($_POST['empID'])){
  $sql = "INSERT INTO Employee (employeeID, fName, lName, role, salary, email, phone, DOB, password, approval)
  VALUES ('$empID', '$fName', '$lName', '$role', '$salary', '$email', 'phone', '$DOB', '$password', 'approval')";

if ($conn->query($sql) === TRUE) {
    echo "Created";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
