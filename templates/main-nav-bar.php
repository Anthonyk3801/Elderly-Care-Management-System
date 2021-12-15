<div class="container">
  <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-center">

<div class="me-5 pe-5">
  <a href="home.php" class="d-flex align-items-center mb-2 mb-lg-0 text-decoration-none">
    <img src="images/elderlycare-logo.png" alt="ElderlyCare Management System Logo">
  </a>
</div>

<!-- LOGIN/LOGOUT BUTTONS -->
    <div class="ms-5 ps-5">
      <button type="button" class="btn bg-info me-2 text-light"><?php echo $_SESSION['fName']. " " . $_SESSION['lName'];?></button>
      <button type="button" class="btn btn-danger text-light" value="logout" onclick="window.location.href='logout.php';">Log Out</button>
    </div>
  </div>
</div>

</header>
<!-- END OF NAV BAR -->
