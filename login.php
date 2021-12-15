<?php
    include 'db_connection.php';
    if(isset($_GET['error'])){
        echo "<P>Incorrect Email or Password.</p>";
    }

    session_start();
    //if user is logged in then transfer to corresponding page depending on their role,
    //this way we prevent loggedin userto acces login/register page.
    if(isset($_SESSION['level'])){
    header('location:extras/transfer.php?error=2');
    }else{
    session_destroy();
    }

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
          <form action="route.php" method="POST">
            <h1 class="h1 mb-3 fw-normal text-center">Login</h1>
            <hr>

            <div class="form-floating mb-3 mt-3">
              <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required>
              <label for="email">Email address</label>
            </div>

            <div class="form-floating mb-3 mt-3">
              <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
              <label for="password">Password</label>
            </div>

            <div class="checkbox mb-3 mt-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>

            <button class="w-100 btn btn-lg btn-info text-light" name="login" id="login" type="submit">Sign in</button>
            <button class="w-100 btn btn-sm btn-secondary text-light mt-1 mb-1" type="reset">Cancel</button>

          </form>

          <p class="mt-3 fw-normal text-center">Don’t have an account? <a class="text-info" href="register.php">Sign Up</a></p>

        </main>


<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
