<?php
session_start();
/*if(!isset($_SESSION['level'])) header('location:home.php');
if(isset($_SESSION['level'])){
    if($_SESSION['level'] != 3) header('location:extras/transfer.php');
};
if($_GET['error'] == 2) echo "You are not authorized for that page";
*/
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

<h1 class="text-center">Doctor's Home</h1>
<hr>

<div class="mt-5 mb-5 text-dark text-center">
  <!-- This button below will have Different values... -->
  <button class="w-100 btn btn-sm btn-info text-light mt-5 mb-5" type="submit" value="search" name="search" id="search">Submit</button>
</div>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
