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

    switch($_SESSION['level']) {
      case '1':
        include 'templates/main-nav-bar.php';
        include 'templates/main-grid-content-2columns.html';
        include 'templates/admin-side-bar.html';
        break;
      case '2':
        include 'templates/main-nav-bar.php';
        include 'templates/main-grid-content-2columns.html';
        include 'templates/supervisor-side-bar.html';
        break;
      case '3':
        include 'templates/main-nav-bar.php';
        include 'templates/main-grid-content-2columns.html';
        include 'templates/doctor-side-bar.html';
        break;
      case '4':
        include 'templates/main-nav-bar.php';
        include 'templates/main-grid-content-2columns.html';
        include 'templates/caregiver-side-bar.html';
        break;
      case '5':
        include 'templates/main-nav-bar.php';
        include 'templates/main-grid-content-2columns.html';
        include 'templates/patient-side-bar.html';
        break;
      case '6':
        include 'templates/main-nav-bar.php';
        include 'templates/main-grid-content-2columns.html';
        include 'templates/familyMember-side-bar.html';
        break;
      default:
        include 'templates/alert-message-before-login.html';
        include 'templates/home-nav-bar.html';
        include 'templates/main-grid-content-1column.html';
    }

    include 'templates/main-content.html';
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

    <input class="btn-info text-light rounded" type="submit" value="Submit">

  </form>
  <hr>

  <form action="login.php" method="POST">
  <div class="form-floating mb-3 mt-3">
    <input type="text" id="fName" name="fName" class="form-control" placeholder="First Name" required>
    <label for="fName">First Name</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="text" id="lName" name="lName" class="form-control" placeholder="Last Name" required>
    <label for="lName">Last Name</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required>
    <label for="email">Email address</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone #" pattern="[0-9]{10}" size="14" minlength="10" maxlength="14" required>
    <label for="phone">Phone #</label>
    <small>Format: 1234567890</small>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
    <label for="password">Password</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="date" id="DOB" name="DOB" class="form-control" placeholder="Date of Birth" required>
    <label for="DOB">Date of Birth</label>
  </div>
  <hr>

<div <?php if($_POST['role'] != 'Patient') echo 'hidden' ?>>
  <div class="form-floating mb-3 mt-3">
    <input type="number" id="familyCode" name="familyCode" min='100' max='999' class="form-control" placeholder="Family Code:">
    <label for="familyCode">Family Code:</label>
    <small>Format: 123 </small>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="text" id="emergencyContactName" name="emergencyContactName" class="form-control" placeholder="Emergency Contact Name:">
    <label for="emergencyContactName">Emergency Contact Name:</label>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="tel" id="emergencyContactNum" name="emergencyContactNum" class="form-control" placeholder="Emergency Contact #:" pattern="[0-9]{10}" pattern="[0-9]{10}" size="14" minlength="10" maxlength="14">
    <label for="emergencyContactNum">Emergency Contact #:</label>
    <small>Format: 1234567890</small>
  </div>

  <div class="form-floating mb-3 mt-3">
    <input type="text" id="emergencyContactRelation" name="emergencyContactRelation" class="form-control" placeholder="Emergency Contact Relation:">
    <label for="emergencyContactRelation">Emergency Contact Relation:</label>
  </div>
  <hr>
</div>

<button class="w-100 btn btn-lg btn-info text-light" type="submit" id="sub" value="Submit" name='sub'>Register</button>
<button class="w-100 btn btn-sm btn-secondary text-light mt-1 mb-1" type="reset">Cancel</button>

</form>
<p class="mt-3 fw-normal text-center">Have an account? <a class="text-info" href="login.php">Log In</a></p>

</main>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
