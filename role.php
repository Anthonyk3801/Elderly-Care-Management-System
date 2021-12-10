<?php
session_start();
//if(!isset($_SESSION['level'])) header('location:home.php');
//if(isset($_SESSION['level'])){
//    if($_SESSION['level'] != 1) header('location:extras/transfer.php');
//};
include 'db_connection.php';
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

        <h1 class="text-center">Role</h1>
        <hr>

        <div class="mb-5 mt-5 text-center">

        <h2>Enter a new role into the database:</h2>
        <br>

        <form action="role.php" method="POST">

            <label for="role">New Role</label>
            <br>
            <input type="text" name="role" id="role" required>
            <br>
            <br>
            <label for="accessLevel">Access Level</label>
            <br>
            <input type="text" name="level" id="accessLevel" maxlength="1" placeholder="1-6" required>
            <br>

            <button class="w-75 btn btn-sm btn-info text-light mt-5 mb-1" type="submit" value="Submit">Submit</button>
            <button class="w-75 btn btn-sm btn-secondary text-light mt-1 mb-1" type="reset">Cancel</button>

        </form>

      </div>

<?php // TEMPLATES
include 'templates/end-main-content.html';
include 'templates/footer.html';
?>


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
