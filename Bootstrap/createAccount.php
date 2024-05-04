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
  * Updated: Jan 29 2024 with Bootstrap v5.3.2
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
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>What's Happening</h1><!--Changed the heading from ZenBlog to What's happening -->
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="dropdown"><a href="events.php?Type=All"><span>Events</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a><!--Changed the href link to events.php -->
            <ul>
              <li><a href="events.php?Type=All">All Events</a></li><!--Changed the content of list element to All Events-->
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
          <li><a href="groups.php">Community Groups</a></li><!--Changed the href link to groups.php and  content of list element to Community Groups -->
          <li><a href="about.php">About</a></li><!--Changed the href link to about.php  -->
          <li><a href="post.php">Post Event</a></li><!--Created new element in the navigation bar with the href link to post.php  -->
          <?php
            echo '<li class="dropdown"><a href="login.php"><span>Login</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>';
            echo  '<ul>';
            echo    '<li><a href="login.php">Login</a></li>';
            echo    '<li><a href="logout.php">Logout</a></li>';
            echo  '</ul>';
            echo '</li>';
          ?>        </ul>
      </nav><!-- .navbar -->


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

  <main id="main">
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Create Account</h1>
            <!--Change the content of h1 to Login from Constat us-->
          </div>
        </div>
        <!-- Removed the top row-->

          <!-- //Changed the format of the form similar in the login.php and modified the id and the name  -->
        <div class="form mt-5">
        <form action="createAccount.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group">
                <div><strong><p>Tell us about your group:</p></strong></div>
                <input type="text" name="groupName" class="form-control" id="groupName" placeholder="Your Community Group" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="eventType" id="eventType" placeholder="What type of group are you?" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="contactName" id="contactName" placeholder="Provide a Contact Name for your group" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="contactEmail" id="contactEmail" placeholder="Provide a Contact Email for your group" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="groupImage" id="groupImage" placeholder="Group Image Name" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="description" rows="2" placeholder="Tell us about your group" required></textarea>
            </div>
            <br>
            <div><p><strong>Create an Account:</p></strong>
            <div class="form-group">
              <input type="text" class="form-control" name="userName" id="userName" placeholder="Create a Username" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="password" id="password" placeholder="Create a Password" required>
            </div>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit" style="background-color: green; color: white">Submit</button></div>
            <!-- Changed the button from send message to login-->
          </form>
          <?php
            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data
                $groupName = $_POST["groupName"];
                $groupType = $_POST["eventType"];
                $contactName = $_POST["contactName"];
                $contactEmail = $_POST["contactEmail"];
                $groupImage = "files/images/Groups/".$_POST["groupImage"].".jpg";
                $description = $_POST["description"];
                $userName = $_POST["userName"];
                $password = $_POST["password"];
                $errorMessage = "";


                // Include database connection
                include 'serverlogin.php';

                // Create connection
                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Check if username already exists
                $checkUsernameQuery = "SELECT * FROM login WHERE Username = ?";
                $checkUsernameStmt = $conn->prepare($checkUsernameQuery);
                $checkUsernameStmt->bind_param("s", $userName);
                $checkUsernameStmt->execute();
                $checkUsernameResult = $checkUsernameStmt->get_result();

                if ($checkUsernameResult->num_rows > 0) {
                    // Username already exists, display error message
                    echo "Username already exists, please choose a different one.";
                } else {
                    
                  $errorMessage = "";
                    if (strlen($password) < 7) {
                        $errorMessage .= "Need atleat 7 characters.<br>";
                    }
                
                    // Checking that password has at least one special character
                    if (!preg_match('/[^a-zA-Z0-9]/', $password)) {
                        $errorMessage .= "Need at least 1 special character.<br>";
                    }
                    // Checking that password has atleast 1 Uppercase character
                    if (!preg_match('/[A-Z]/', $password)) {
                        $errorMessage .= "Need atleast 1 Capital Letter.<br>";
                    }
                
                    // Checking that password has atleast one number
                    if (!preg_match('/[0-9]/', $password)) {
                        $errorMessage .= "Need atleast 1 number.<br>";
                    }
                
                    // This will approve the password if all the checks are passed
                    if (empty($errorMessage)) {
                    
                        // Insert group information into Groups table
                        $insertGroupQuery = "INSERT INTO Groups (GroupName,GroupImage, GroupType,GroupDesc, contactName, ContactEmail) 
                                            VALUES (?, ?, ?, ?, ?, ?)";
                        $insertGroupStmt = $conn->prepare($insertGroupQuery);
                        $insertGroupStmt->bind_param("ssssss", $groupName, $groupImage, $groupType, $description, $contactName, $contactEmail);

                        if ($insertGroupStmt->execute()) {
                            // Get the newly inserted GroupID
                            $groupID = $conn->insert_id;

                            // Insert login information into Login table
                            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                            $insertLoginQuery = "INSERT INTO Login (GroupID, Username, Password) 
                                                VALUES (?, ?, ?)";
                            $insertLoginStmt = $conn->prepare($insertLoginQuery);
                            $insertLoginStmt->bind_param("iss", $groupID, $userName, $hashedPassword);

                            if ($insertLoginStmt->execute()) {
                                // Set session variables
                                $_SESSION["login"] = TRUE;
                                $_SESSION["GroupID"] = $groupID;

                                
                            } else {
                                echo "Error: " . $insertLoginStmt->error;
                            }
                            $insertGroupStmt->close();
                            $insertLoginStmt->close();
                        } 
                        else {
                            echo "Error: " . $insertGroupStmt->error;
                        }
                    }
                }

                // Close prepared statements
                $checkUsernameStmt->close();

                // Close database connection
                $conn->close();
            }
          ?>

          <?php
            echo $errorMessage;
          ?>


        </div><!-- End Contact Form -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  <div class="footer-content">
      <div class="container">

        <div class="row g-5">
          <div class="col-lg-4">
            <h3 class="footer-heading">About What's Happening</h3><!-- Changed the content in h3 element to About What's Happening-->
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam ab, perspiciatis beatae autem deleniti voluptate nulla a dolores, exercitationem eveniet libero laudantium recusandae officiis qui aliquid blanditiis omnis quae. Explicabo?</p>
            <p><a href="about.php" class="footer-link-more">Learn More</a></p>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Navigation</h3><!-- Changed the content in h3 element to About What's Happening-->
            <ul class="footer-links list-unstyled">
              <li><a href="index.php"><i class="bi bi-chevron-right"></i> Home</a></li><!--Changed the href link to index.php and  content of list element to Home -->
              <li><a href="events.php?Type=All"><i class="bi bi-chevron-right"></i> Events</a></li><!--Changed the href link to event.php and  content of list element to Events -->
              <li><a href="groups.php"><i class="bi bi-chevron-right"></i> Community Groups</a></li><!--Changed the href link to groups.php and  content of list element to Community Groups -->
              <li><a href="about.php"><i class="bi bi-chevron-right"></i> About</a></li><!--Changed the href link to obout.php and  content of list element to About -->
              <li><a href="post.php"><i class="bi bi-chevron-right"></i> Post Event</a></li><!-- Created new Element under the Navigation list called post and linked it to post.php -->
              <li><a href="login.php"><i class="bi bi-chevron-right"></i> Login</a></li><!--Changed the href link to login.php and  content of list element to login -->
            </ul>
          </div>
          <div class="col-6 col-lg-2">
            <h3 class="footer-heading">Events</h3><!-- Changed the content in h3 element to Events-->
            <ul class="footer-links list-unstyled">
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