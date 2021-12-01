<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- General CSS-->
    <link rel="stylesheet" href="CSS/styles.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Bootstrap Icons (Extra) -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

    <title>ElderlyCare Management System</title>
  </head>

  <body class="bg-info">

<!-- NAV BAR-->
<header class="p-5 bg-dark text-white mt-3">

<!-- ALERT MESSAGE -->
  <div class="container">
	<div class="row">
	<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="bg-dark text-info" data-dismiss="alert"><span aria-hidden="true">Close</span><span class="sr-only"></span></button>
  <strong><i class="fa fa-info-circle"></i></strong>
  <marquee><p style="font-family: Impact; font-size: 18pt">In order to use the software, you would have to be logged in. However, if you don't have an account yet, then please proceed to Sign Up.</p></marquee>
  </div>
  </div>
  </div>
<!-- END OF ALERT MESSAGE -->

    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-13 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="home.php" class="nav-link px-2 text-info">Home</a></li>
          <li><a href="README.md" class="nav-link px-2 text-white">About</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Watever 3</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Watever 4</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Watever 5</a></li>
        </ul>
<!-- SEARCH BAR -->
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
        </form>
<!-- LOGIN/LOGOUT BUTTONS -->
        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2" value="Login" onclick="window.location.href='login.php';">Login</button>
          <button type="button" class="btn btn-info" value="Register" onclick="window.location.href='register.php';">Sign-up</button>
        </div>
      </div>
    </div>

  </header>
<!-- END OF NAV BAR -->

  <div class="container-fluid pb-5 p-3 mb-0 mt-0 bg-dark text-dark rounded-0">
    <div class="d-grid gap-3" style="grid-template-columns: auto auto">

        <div class="rounded-3 bg-dark visible">
          <!-- SIDE BAR -->
          <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark rounded-3" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
              <span class="fs-4">Sidebar</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page">
                  <svg class="bi me-5" width="16" height="16"><use xlink:href="#home"></use></svg>
                  Side Ever 1
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi me-5" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                  Side Ever 2
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi me-5" width="16" height="16"><use xlink:href="#table"></use></svg>
                  Side Ever 3
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi me-5" width="16" height="16"><use xlink:href="#grid"></use></svg>
                  Side Ever 4
                </a>
              </li>
              <li>
                <a href="#" class="nav-link text-white">
                  <svg class="bi me-5" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
                  Side Ever 5
                </a>
              </li>
            </ul>
            <hr>
          </div>
          <!-- END OF SIDE BAR -->
        </div>

        <div class="bg-light border rounded-3 px-5 mx-3">
          <br><br><br><br><br>
          <!-- MAIN BODY -->
            <div>
              <div style="margin:10px;">
                <h1>ElderlyCare Management System</h1>
                <br>
                <hr>

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
            </div>
          <!-- END OF MAIN BODY-->
          <br><br><br><br><br>
        </div>

      </div>
    </div>

  <!-- FOOTER -->
<footer class="py-3 p-3 bg-dark mb-3 text-white">
    <ul class="nav justify-content-center pb-1 mb-1 border-top border-bottom">
      <li class="nav-item"><a href="terms-of-use.php" class="nav-link px-1 text-light">Terms of Use</a></li>
      <li class="nav-item nav-link px-2 text-light">|</li>
      <li class="nav-item"><a href="privacyStatement.php" class="nav-link px-1 text-light">Privacy Statement</a></li>
    </ul>
    <p class="text-center text-light">© 2021 ElderlyCare Management System, Inc</p>
  </footer>
 <!-- END OF FOOTER -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
