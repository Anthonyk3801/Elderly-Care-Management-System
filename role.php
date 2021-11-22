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
    $sql = "SELECT * FROM Roles WHERE role = '$_POST[role]'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row["role"] == $_POST['role']) {
        echo '<p>That role has already been set.</p>';
    } else {
        $sql = "INSERT INTO Roles (role, accessLevel)
        VALUES ('$_POST[role]', $_POST[level])";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
};
?>
