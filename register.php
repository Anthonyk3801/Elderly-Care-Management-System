<?php
    include 'db_connection.php';
    $sql = "SELECT * FROM Roles;";

    $result = $conn->query($sql);
?>

<?php //TEMPLATES
    include 'templates/header.html';
    include 'templates/alert-message-before-login.html';
    include 'templates/nav-bar.html';
    include 'templates/main-grid-content-1column.html';
    //include 'templates/main-grid-content-2columns.html';
    //include 'templates/side-bar.html';
    //include 'templates/side-bar-hidden.html';
    include 'templates/main-content.html';
    //include 'templates/end-main-content.html';
    //include 'templates/footer.html';
?>

<form action="register.php" method="POST">
        <label for="role">Choose a role:</label>
        <select id="role" name="role">
            <option value="nothing"> ---</option>
            <?php
            while($res = mysqli_fetch_array($result)) {
            ?>
                 <option value="<?php echo $res['role'];?>"><?php echo $res['role'];?></option>;
            <?php
            }
            ?>
        </select>

        <input type="submit" value="Submit">

</form>

​
<form action="home.php" method="POST">

    <label for="role2">Role</label>
    <input readonly type="text" id="role2" name="role2" value="<?php echo $_POST['role'] ?>">

    <br>

    <label for="fName">First Name</label>
    <input type="text" id="fName" name="fName">
​
    <br>
​
    <label for="lName">Last Name:</label>
    <input type="text" id="lName" name="lName">
​
    <br>
​
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">

    <br>
​
    <label for="phone">Phone #:</label>
    <input type="tel" id="phone" name="phone">
​
    <br>
​
    <label for="password">Password:</label>
    <input type="text" id="password" name="password">
​
    <br>
​
    <label for="DOB">D.O.B:</label>
    <input type="date" id="DOB" name="DOB">

    <br>
​
    <div id='patientOnly'>
        <label for="familyCode">Family Code:</label>
        <input type="number" id="familyCode" name="familyCode" min='100' max='999' <?php if($_POST['role'] != 'Patient') echo 'disabled' ?>>
​
        <br>
​
        <label for="emergencyContactName">Emergency Contact Name:</label>
        <input type="text" id="emergencyContactName" name="emergencyContactName" <?php if($_POST['role'] != 'Patient') echo 'disabled' ?>>

        <br>
​
        <label for="emergencyContactNum">Emergency Contact #:</label>
        <input type="tel" id="emergencyContactNum" name="emergencyContactNum" <?php if($_POST['role'] != 'Patient') echo 'disabled' ?>>
​
        <br>
​
        <label for="emergencyContactRelation">Emergency Contact Relation:</label>
        <input type="text" id="emergencyContactRelation" name="emergencyContactRelation" <?php if($_POST['role'] != 'Patient') echo 'disabled' ?>>
    </div>

    <br>
​
    <input type="submit" id="sub" value="Submit" name='sub'>
​
</form>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
