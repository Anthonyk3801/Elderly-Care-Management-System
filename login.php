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

        <form action="route.php" method="post">
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" required>
            <label for="password">Password: </label>
            <input type="text" name="password" id="password" required>
            <input type="submit" name="login" id="login" value="LOGIN">
        </form>


<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
