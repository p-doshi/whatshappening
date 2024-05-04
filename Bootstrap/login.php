<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>What's Happening</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

   <!-- ======= Header ======= -->
   <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <h1>What's Happening</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li><!-- changed .html to .php-->
          <li class="dropdown"><a href="events.php"><span>Events</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a><!-- changed .html to .php-->
          <ul>
              <li><a href="events.php">All Events</a></li>

              <!-- php code to make use of singlepost -->
              <?php 
              echo '<li><a href="single-post.php?eventName=events&eventtype=Music">Music</a></li>';
              echo '<li class="dropdown"><a href="single-post.php?eventName=events&eventtype=Art%2bCulture"><span>Art+Culture</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>';
                echo '<ul>';
                echo  '<li><a href="#">Deep Drop Down 1</a></li>';
                echo  '<li><a href="#">Deep Drop Down 2</a></li>';
                echo  '<li><a href="#">Deep Drop Down 3</a></li>';
                echo  '<li><a href="#">Deep Drop Down 4</a></li>';
                echo  '<li><a href="#">Deep Drop Down 5</a></li>';
                echo'</ul>';
              echo'</li>' ;
              echo'<li><a href="single-post.php?eventName=events&eventtype=Sport">Sport</a></li>';
              echo'<li><a href="single-post.php?eventName=events&eventtype=Food">Food</a></li>';
              echo'<li><a href="single-post.php?eventName=events&eventtype=Fund Raiser">Fund Raiser</a></li>';
            echo'</ul>'//changed dropdown headings
          ?>
          </li>
          <li><a href="groups.php">Community Groups</a></li><!-- changed .html to .php-->
          <li><a href="about.php">About</a></li><!-- changed .html to .php-->
          <li><a href="post.php">Post Event</a></li>
          <?php
            echo '<li class="dropdown"><a href="login.php"><span>Login</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>';
            echo  '<ul>';
            echo    '<li><a href="login.php">Login</a></li>';
            echo    '<li><a href="logout.php">Logout</a></li>';
            echo '</ul>';
            echo '</li>';
          ?>
        </ul>
      </nav>
      <div class="position-relative">
        <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="#" class="mx-2"><span class="bi-instagram"></span></a>

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->

  <main id="main"><!-- removed unwanted features-->
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Login</h1>
          </div>
        </div>

        <div class="form mt-5">
        <form action="login.php" method="post" role="form" class="php-email-form">
            <div class="row">
                <div class="form-group">
                    <input type="text" name="userName" class="form-control" id="userName" placeholder="Your Username" required>
                </div>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Your Password" required>
            </div>
            <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit" style="border-radius: 5px;">Login</button></div>
        </form>
        <?php
          session_start();
          $error = '';
          if (isset($_SESSION["login"]) && $_SESSION["login"] === TRUE) {
              header("location: post.php");
              exit;
          }

          // Check if form is submitted
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
              // Retrieve username and password from form
              $username = $_POST["userName"];
              $password = $_POST["password"];

              // Database connection (replace with your database credentials)
              include 'serverlogin.php';

              // Create connection
              $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

              // Prepare SQL statement to check if username exists
              $sql = "SELECT * FROM login WHERE Username = ?";
              $stmt = $conn->prepare($sql);
              $stmt->bind_param("s", $username);
              $stmt->execute();
              $result = $stmt->get_result();

              if ($result->num_rows > 0) {
                  // Username exists, now check password
                  $row = $result->fetch_assoc();
                  $the_password = $row["Password"]; // Assuming password is stored hashed in the database

                  // Verify password
                  if (password_verify($password, $the_password)) {
                      $_SESSION["login"] = TRUE;
                      $_SESSION["AccountID"] = $row['AccountID'];
                      $_SESSION["GroupID"] = $row['GroupID'];
                      $stmt->close();
                      header("location: post.php");
                      exit();
                  } else {
                      // Password is incorrect, display error message
                      $error = "Password is incorrect, please try again";
                  }
              } else {
                  // Username does not exist, display error message
                  $error = "Username is incorrect, please try again";
              }

              if(isset($error)){
                  echo '<div class="text-center">'.$error.'</div>';
              }

              // Close prepared statement
              $stmt->close();
              // Close database connection
              $conn->close();
          }
          ?>


        <div class="text-center"><strong>
                <br>
                <p>Don't have an account?
                    <br>
                    Sign up your group and start posting your events.
                </p>
            </strong>
            <div class="text-center"><a href="createAccount.php"><button type="button" style="background-color: green; color: white; border-radius: 15px; padding: 2%;">Create Account</button></a></div>

        </div>
    </div>
<!-- End Contact Form -->

      </div>
    </section>

  </main><!-- End #main -->

 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">

<div class="footer-content">
  <div class="container">

    <div class="row g-5">
    <div class="col-lg-4">
            <h3 class="footer-heading">About What's Happening</h3><!-- changed heading-->
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
            <p><a href="about.php" class="footer-link-more">Learn More</a></p>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Navigation</h3>
            <ul class="footer-links list-unstyled"><!-- changed headings and converted to php files-->
              <li><a href="index.php"><i class="bi bi-chevron-right"></i> Home</a></li>
              <li><a href="events.php"><i class="bi bi-chevron-right"></i> Events</a></li>
              <li><a href="groups.php"><i class="bi bi-chevron-right"></i> Community Groups</a></li>
              <li><a href="about.php"><i class="bi bi-chevron-right"></i> About </a></li>
              <li><a href="post.php"><i class="bi bi-chevron-right"></i> Post Event </a></li>
              <li><a href="login.php"><i class="bi bi-chevron-right"></i> Login</a></li>
            </ul>
          </div>
      <div class="col-6 col-lg-2">
        <h3 class="footer-heading">Events</h3>
        <ul class="footer-links list-unstyled"><!-- changed headings and converted to php files-->
          <li><a href="events.php"><i class="bi bi-chevron-right"></i> All Events</a></li>

          <!-- php code to make use of singlepost -->
          <?php
                  echo  '<li><a href="single-post.php?eventName=events&eventtype=Music"><i class="bi bi-chevron-right"></i>Music</a></li>';
                  echo  '<li><a href="single-post.php?eventName=events&eventtype=Art%2bCulture"><i class="bi bi-chevron-right"></i>Art+Culture</a></li>';
                  echo  '<li><a href="single-post.php?eventName=events&eventtype=Sport"><i class="bi bi-chevron-right"></i> Sport</a></li>';
                  echo  '<li><a href="single-post.php?eventName=events&eventtype=Food"><i class="bi bi-chevron-right"></i> Food</a></li>';
                  echo  '<li><a href="single-post.php?eventName=events&eventtype=Fund Raiser"><i class="bi bi-chevron-right"></i> Fund Raiser</a></li>';
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="footer-legal">
  <div class="container">

    <div class="row justify-content-between">
      <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
        <div class="copyright">
          © Copyright <strong><span>ZenBlog</span></strong>. All Rights Reserved
        </div>

        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>

      </div>

      <div class="col-md-6">
        <div class="social-links mb-3 mb-lg-0 text-center text-md-end">
          <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>

      </div>

    </div>

  </div>
</div>

</footer>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>