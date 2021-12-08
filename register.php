<?php
    include 'db_connection.php';
    $sql = "SELECT * FROM Roles;";

    $result = $conn->query($sql);

    /*session_start();
    if(isset($_SESSION['level'])){
    header('location:extras/transfer.php?error=2');
    }else{
    session_destroy();
    }
    */
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

<main class="form-signing">
  <form action="register.php" method="POST">
    <h1 class="h1 mb-3 fw-normal text-center">Sign Up</h1>
    <hr>
    <label for="role">Choose a role:</label>
    <select id="role" name="role">
        <option value="nothing"> --- </option>
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

  <form action="home.php" method="POST">
  <div class="form-floating mb-3 mt-3">
    <input type="text" id="fName" name="fName" class="form-control" placeholder="First Name">
    <label for="fName">First Name</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="text" id="lName" name="lName" class="form-control" placeholder="Last Name">
    <label for="lName">Last Name</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com">
    <label for="email">Email address</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="tel" id="phone" name="phone" class="form-control" placeholder="000-000-0000">
    <label for="phone">Phone #</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
    <label for="password">Password</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="date" id="DOB" name="DOB" class="form-control" placeholder="Date of Birth">
    <label for="DOB">Date of Birth</label>
  </div>

<div class="form-floating mb-3 mt-3">
  <input type="number" id="familyCode" name="familyCode" min='100' max='999' class="form-control" placeholder="Family Code:" <?php if($_POST['role'] != 'Patient') echo 'hidden' ?>>
  <label for="familyCode">Family Code:</label>
</div>

<div class="form-floating mb-3 mt-3">
  <input type="text" id="emergencyContactName" name="emergencyContactName" class="form-control" placeholder="Emergency Contact Name:" <?php if($_POST['role'] != 'Patient') echo 'hidden' ?>>
  <label for="emergencyContactName">Emergency Contact Name:</label>
</div>

<div class="form-floating mb-3 mt-3">
  <input type="tel" id="emergencyContactNum" name="emergencyContactNum" class="form-control" placeholder="Emergency Contact #:" <?php if($_POST['role'] != 'Patient') echo 'hidden' ?>>
  <label for="emergencyContactNum">Emergency Contact #:</label>
</div>

<div class="form-floating mb-3 mt-3">
  <input type="text" id="emergencyContactRelation" name="emergencyContactRelation" class="form-control" placeholder="Emergency Contact Relation:" <?php if($_POST['role'] != 'Patient') echo 'hidden' ?>>
  <label for="emergencyContactRelation">Emergency Contact Relation:</label>
</div>

<button class="w-100 btn btn-lg btn-primary" type="submit" id="sub" value="Submit" name='sub'>Register</button>

</form>
</main>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
