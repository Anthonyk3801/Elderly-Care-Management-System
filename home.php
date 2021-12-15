<?php
include 'db_connection.php';
session_start();
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
    include 'templates/home-nav-bar.html';
    //include 'templates/admin-nav-bar.php';
    //include 'templates/supervisor-nav-bar.html';
    //include 'templates/doctor-nav-bar.html';
    //include 'templates/caregiver-nav-bar.html';
    //include 'templates/patient-nav-bar.html';
    //include 'templates/familyMember-nav-bar.html';

    //include 'templates/main-grid-content-1column.html';
    include 'templates/main-grid-content-2columns.html';

    //include 'templates/side-bar.html';
    //include 'templates/side-bar-hidden.html';
    include 'templates/admin-side-bar.html';
    //include 'templates/supervisor-side-bar.html';
    //include 'templates/doctor-side-bar.html';
    //include 'templates/caregiver-side-bar.html';
    //include 'templates/patient-side-bar.html';
    //include 'templates/familyMember-side-bar.html';

    include 'templates/main-content.html';

    //include 'templates/end-main-content.html';
    //include 'templates/footer.html';
?>

        <h1 class="text-center pb-5">ElderlyCare Management System</h1>
        <hr>

        <ul class="nav col-13 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="patientInformation.php" class="nav-link px-2 text-dark">patientInformation</a></li>
          <li><a href="appointment.php" class="nav-link px-2 text-dark">appointment</a></li>
          <li><a href="role.php" class="nav-link px-2 text-dark">role</a></li>
          <li><a href="patientHome.php" class="nav-link px-2 text-dark">patientHome</a></li>
          <li><a href="employee.php" class="nav-link px-2 text-dark">employee</a></li>
          <li><a href="patient.php" class="nav-link px-2 text-dark">patient</a></li>
          <li><a href="registrationApproval.php" class="nav-link px-2 text-dark">registrationApproval</a></li>
          <li><a href="roster.php" class="nav-link px-2 text-dark">roster</a></li>
          <li><a href="newRoster.php" class="nav-link px-2 text-dark">newRoster</a></li>
          <li><a href="doctorHome.php" class="nav-link px-2 text-dark">doctorHome</a></li>
          <li><a href="patientDoctor.php" class="nav-link px-2 text-dark">patientDoctor</a></li>
          <li><a href="caregiverHome.php" class="nav-link px-2 text-dark">caregiverHome</a></li>
          <li><a href="familyMemberHome.php" class="nav-link px-2 text-dark">familyMemberHome</a></li>
          <li><a href="adminReport.php" class="nav-link px-2 text-dark">adminReport</a></li>
          <li><a href="payment.php" class="nav-link px-2 text-dark">payment</a></li>
        </ul>
        <hr>
        <br>

      <div class="mb-5 text-start p-5">
        <h2>General info</h1>
          <br>
        <h3>CSET 220 - Software Project III</h2>

        <p>The goal of this project is to emulate a
        real-world agency process to plan, design,
        and build a working web application
        according to client specifications and
        employer defined workflows. It will utilize
        everything we've learned this year.</p>

        <h4>The Schedule</h3>
        <p>This is a five-week project. Each week will
        start with a planning day to prep a week's
        worth of stories and review the previous
        week's deployment.</p>
        <hr>
        <h3>Technologies</h2>
        <ul>
          <li>HTML5</li>
          <li>CSS3</li>
          <li>JavaScript</li>
          <li>PHP</li>
          <li>phpMyAdmin</li>
          <li>MySQL</li>
          <li>Agile Process</li>
          <li>Feature Branch Git Workflow</li>
        </ul>
        <hr>
        <h3>Collaborators</h2>
        <ul>
          <li>Hari Allen</li>
          <li>Anthony Keller</li>
          <li>Jody Winters</li>
          <li>Julio Pochet Edmead</li>
        </ul>
    </div>

<?php // TEMPLATES
  include 'templates/end-main-content.html';
  include 'templates/footer.html';
?>
