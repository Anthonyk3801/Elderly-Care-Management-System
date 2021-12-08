<?php
    include 'db_connection.php';
    if(isset($_GET['error'])){
        echo "<P>Incorrect Email or Password.</p>";
    }
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
          <form action="route.php" method="post">
            <h1 class="h1 mb-3 fw-normal text-center">Login</h1>
            <hr>
            <div class="form-floating mb-3 mt-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3 mt-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3 mt-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
          </form>
        </main>

<!-- this is the old code... now gotta implement the database to the new form
        <form action="route.php" method="post">
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" required>
            <br><br>
            <label for="password">Password: </label>
            <input type="text" name="password" id="password" required>
            <br><br>
            <input type="submit" name="login" id="login" value="LOGIN">
        </form>
-->


<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
