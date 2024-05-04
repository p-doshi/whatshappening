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
              echo'<li><a href="single-post.php?eventName=events&eventtype=Sports">Sport</a></li>';
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
            echo  '</ul>';
            echo '</li>';
          ?>        </ul>
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

  <main id="main">
    <section>
      <div class="container">
        <div class="row">

          <div class="col-md-9" data-aos="fade-up">
            <h3 class="category-title">Event Category: All</h3>

            <?php
                include 'serverlogin.php';
                          
                        
                $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $urlEventName = isset($_GET['eventName']) ? $_GET['eventName'] : '';
                $urlEventType = isset($_GET['eventtype']) ? $_GET['eventtype'] : '';

                // URL decode parameters

                  //While loop that will iterate throught the csv file and store it in different ararys
                  $eventsQuery = "SELECT * 
                                  FROM events e
                                  INNER JOIN groups g ON e.GroupID = g.GroupID
                                  INNER JOIN eventtypes et ON e.EventTypeID = et.EventTypeID
                                  ORDER BY e.EventDate";
                  $eventsResult = mysqli_query($conn, $eventsQuery);
                  
                  // Check if the query ran successfully
                  if (!$eventsResult) {
                      die("Query failed!" . mysqli_error($conn));
                  }
                  
                  // Loop through each row in the events table
                  while ($row = mysqli_fetch_assoc($eventsResult)) {
                      // Storing the values of columns in a row into different variables
                      $eventID = $row["EventID"];
                      $eventTypeID = $row["EventTypeID"];
                      $groupID = $row["GroupID"];
                      $eventDate = $row["EventDate"];
                      $eventTitle = $row["EventTitle"];
                      $eventImage = $row["EventImage"];
                      $eventDesc = $row["EventDesc"];
                      $event_Type = $row["EventType"];
                      $group_Image = $row["GroupImage"];
                      $group_name = $row["GroupName"];
                      // Formating the date to a certain format to display it on the page
                     
                      $eventDateTime = new DateTime($eventDate);
                      $currentDateTime = new DateTime();

                      // Format event date and current date
                      $dateFormat = $eventDateTime->format('d-M-y');
                      $timeFormat = $eventDateTime->format('g:i A');
                      

                      if($currentDateTime <= $eventDateTime){
                        echo '<div class="d-md-flex post-entry-2 half">';
                        echo '<a href="single-post.php?eventName='.$eventTitle.'&eventtype='.$event_Type.'" class="me-4 thumbnail">';
                        echo '<img src="' . $eventImage . '" alt="" class="img-fluid">';
                        echo '</a>';
                        echo '<div>';
                        echo '<div class="post-meta"><span class="date">' . $event_Type . '</span> <span class="mx-1">&bullet;</span> <span>' . $dateFormat . '</span><span class="mx-1">&bullet;</span> <span>' . $timeFormat . '</span></div>';
                        echo '<h3><a href="single-post.php?eventName=' . $eventTitle . '&eventtype='.$event_Type.'"</a>'.$eventTitle.'</h3>';
                        echo '<div class="d-flex align-items-center author">';
                        echo '<div class="photo"><img src="' . $group_Image . '" alt="" class="img-fluid"></div>';
                        echo '<div class="name">';
                        echo '<h3 class="m-0 p-0">' . $group_name . '</h3>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                      }
                  
                      
                  }
                  
                  // Closing the connection
                  $conn->close();
                ?>
                <div class="text-start py-4">
                  <div class="custom-pagination">
                    <a href="#" class="prev">Previous</a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#" class="next">Next</a>
                  </div>
                </div>
          </div>
          <div class="col-md-3">
            <!-- ======= Sidebar ======= -->
            <div class="aside-block">

              <ul class="nav nav-pills custom-tab-nav mb-4" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="pills-popular-tab" data-bs-toggle="pill" data-bs-target="#pills-popular" type="button" role="tab" aria-controls="pills-popular" aria-selected="true">Upcoming</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="false">Latest Added</button>
                </li>
              </ul>

              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-popular" role="tabpanel" aria-labelledby="pills-popular-tab">
                <!-- Upcoming-->

                <?php
                  // Connect to the database (replace with your database credentials)
                  include 'serverlogin.php';

                  // Create connection
                  $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                  if ($conn->connect_error) {
                      die("Connection failed: " . $conn->connect_error);
                  }

                  // Fetch upcoming events ordered by EventDate
                  $upcoming_query = "SELECT * 
                                      FROM events e
                                      INNER JOIN groups g ON e.GroupID = g.GroupID
                                      INNER JOIN eventtypes et ON e.EventTypeID = et.EventTypeID
                                      ORDER BY e.EventDate ASC ";
                  $upcoming_result =  mysqli_query($conn, $upcoming_query);
        

                  // Display upcoming events
                  if (mysqli_num_rows($upcoming_result) > 0) {
                      while($row = mysqli_fetch_assoc($upcoming_result)) {
                          $eventDate = $row["EventDate"];
                          $eventTitle = $row["EventTitle"];
                          $event_Type = $row["EventType"];
                          $group_name = $row["GroupName"];
                          // Formating the date to a certain format to display it on the page
                          $eventDateTime = new DateTime($eventDate);
                          $currentDateTime = new DateTime();

                          // Format event date and current date
                          $dateFormat = $eventDateTime->format('d-M-y');
                          $timeFormat = $eventDateTime->format('g:i A');
                          if($currentDateTime <= $eventDateTime){
                          echo '<div class="post-entry-1 border-bottom">';
                          echo '<div class="post-meta"><span class="date">' . $event_Type . '</span> <span class="mx-1">&bullet;</span> <span>' . $dateFormat . '</span></div>';
                          echo '<h2 class="mb-2"><a href="single-post.php?eventName=' . $eventTitle . '&eventtype='.$event_Type.'">' . $eventTitle . '</a></h2>';
                          echo '<span class="author mb-3 d-block">' . $group_name . '</span>';
                          echo '</div>';
                          }
                      }
                  }
                  // Close database connection
                  $conn->close();
                ?>
                </div> <!-- Upcoming -->

                <!-- Latest Added -->
                <div class="tab-pane fade" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                  <?php

                    include 'serverlogin.php';

                    // Create connection
                    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $latest_query = "SELECT * 
                                      FROM events e
                                      INNER JOIN groups g ON e.GroupID = g.GroupID
                                      INNER JOIN eventtypes et ON e.EventTypeID = et.EventTypeID
                                      ORDER BY e.SubmitDate DESC";

                    $latest_result =  mysqli_query($conn, $latest_query);

                    if (mysqli_num_rows($latest_result) > 0) {
                      while($row = mysqli_fetch_assoc($latest_result)) {
                          $eventDate = $row["EventDate"];
                          $eventTitle = $row["EventTitle"];
                          $event_Type = $row["EventType"];
                          $group_name = $row["GroupName"];
                          // Formating the date to a certain format to display it on the page
                          $date = date_create($eventDate);
                          $dateFormat = date_format($date, 'd-M-y');
                          
                          echo '<div class="post-entry-1 border-bottom">';
                          echo '<div class="post-meta"><span class="date">' . $event_Type . '</span> <span class="mx-1">&bullet;</span> <span>' . $dateFormat . '</span></div>';
                          echo '<h2 class="mb-2"><a href="single-post.php?eventName=' . $eventTitle . '&eventtype='.$event_Type.'">' . $eventTitle . '</a></h2>';
                          echo '<span class="author mb-3 d-block">' . $group_name . '</span>';
                          echo '</div>'; 
                        }
                    }
                  ?>
                </div> <!-- Latest Added -->

              </div>
            </div>

              <!-- Categories -->
            <div class="aside-block">
              <h3 class="aside-title">Events</h3>
              <ul class="aside-links list-unstyled">
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
            </div><!-- End Categories -->

            <!-- Tags -->
            <div class="aside-block">
              <h3 class="aside-title">Tags</h3>
              <ul class="aside-tags list-unstyled">
                <li><a href="events.php">All Events</a></li>

                <!-- php code to make use of singlepost -->
                <?php
                  echo  '<li><a href="single-post.php?eventName=events&eventtype=Music"><i class="bi bi-chevron-right"></i>Music</a></li>';
                  echo  '<li><a href="single-post.php?eventName=events&eventtype=Art%2bCulture"><i class="bi bi-chevron-right"></i>Art+Culture</a></li>';
                  echo  '<li><a href="single-post.php?eventName=events&eventtype=Sport"><i class="bi bi-chevron-right"></i> Sport</a></li>';
                  echo  '<li><a href="single-post.php?eventName=events&eventtype=Food"><i class="bi bi-chevron-right"></i> Food</a></li>';
                  echo  '<li><a href="single-post.php?eventName=events&eventtype=Fund Raiser"><i class="bi bi-chevron-right"></i> Fund Raiser</a></li>';
          ?>
              </ul>
            </div><!-- End Tags -->

          </div>

        </div>
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
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>