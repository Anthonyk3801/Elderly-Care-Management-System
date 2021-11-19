<?php
include 'db_connection.php';
?>
<form action="role.php" method="POST">
    <label for="role">New Role</label>
    <input type="text" name="role" id="role">

    <label for="accessLevel">accessLevel</label>
    <input type="text" name="level" id="accessLevel">

    <input type="submit" value="submit">
</form>
<?php
if (isset($_POST['role'])) {
    $role = $_POST['role'];
    $level = $_POST['level'];
};
if (isset($_POST['role'])) {

    $sql = "INSERT INTO Roles (role, accessLevel)
VALUES ('$role', $level)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>