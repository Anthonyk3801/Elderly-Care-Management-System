<?php
include 'db_connection.php';
?>
<html>
    <head>
    <link rel="stylesheet" href="CSS/roleStyles.css">
    </head>
    <body>
        <h1>Enter a new role into the database</h1>
        <form action="role.php" method="POST">
            <label for="role">New Role</label>
            <input type="text" name="role" id="role" required>

            <label for="accessLevel">Access Level</label>
            <input type="text" name="level" id="accessLevel" maxlength="1" placeholder="1-6" required>

            <input type="submit" value="submit">
        </form>
    </body>
</html>
<?php
if(isset($_POST['role'])){
    $role = $_POST['role'];
    $level = $_POST['level'];

    $sql = "SELECT * FROM Roles WHERE role = '$role'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row["role"] == $role) {
        echo '<p>That role has already been set.</p>';
    } else {
        $sql = "INSERT INTO Roles (role, accessLevel)
        VALUES ('$role', $level)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
};
?>
