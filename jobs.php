<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Meta -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <!-- Favocon -->
  <link href="img/fav.png" rel="shortcut icon" type="image/x-icon"/>

  <!-- Title -->
  <title>RecruitPlus - Staffing and Consulting Bootstrap HTML Template</title>

  <!-- Bootstrap Core CSS -->
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom icon Fonts -->
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Animated CSS -->
  <link href="css/animate.css" media="all" rel="stylesheet" type="text/css" />

  <!-- Main CSS -->

  <link href="css/default.css" rel="stylesheet">

</head>

<!-- Body -->
<body>
  <!-- Pre Loader -->
  <div class="loading">
    <div class="loader"></div>
  </div>
  <!-- Top Bar  -->
  <div class="konnect-info">
    <div class="container">
      <div class="row"> 
        <!-- Top bar Left -->
        <div class="col-md-6 col-sm-8 hidden-xs">
          <ul>
            <li><i class="fa fa-paper-plane" aria-hidden="true"></i> support@konnectplugins.com </li>
            <li class="li-last"> <i class="fa fa-volume-control-phone" aria-hidden="true"></i> (040) 123-4567</li>
          </ul>
        </div>
        <!-- Top bar Right -->
        <div class="col-md-6 col-sm-4">
          <ul class="konnect-float-right">
            <li class="li-last"><a target="_blank" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a> <a target="_blank" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a> <a target="_blank" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a target="_blank" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a><a href="#"> <i class="fa fa-instagram"></i> </a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Navigation + LOGO Area -->
  <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header"> 
        <!-- Responsive Menu -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <i class="fa fa-bars" aria-hidden="true"></i> </button>
        <!-- Logo --> 
        <a class="navbar-brand page-scroll logo-color" href="index.html"><img src="img/logo.png" alt="logo" width="162"></a> </div>
      
      <!-- Menu Items -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.html">Home</a></li>
          </li>
          <li> <a href="about-us.html">About Us</a> </li>
          <li> <a href="services.html">Services</a> </li>
          <li class="active"><a href="jobs.html">Current Jobs</a></li>
          <li><a href="contact-2.html">Contact Us</a></li>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container-fluid --> 
  </nav>
  <!-- Banner -->
  <header class="innner-page">
    <div class="container">
      <h1><i class="fa fa-angle-double-right" aria-hidden="true"></i> Current Jobs</h1>
    </div>
  </header>

  <!-- Current Openings-->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 text-dark"> 
          <!--Heading-->
          <h2 class="section-heading text-dark">Apply for <span>Suitable Job Profile</span></h2>
          <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
          <div class="konnect-space"></div>
        </div>
      </div>
    </div>
    <!-- Openings table heading-->
    <div class="container">
      <div class="row">
        <div class="job-single-header">
          <div class="col-sm-4">Job Title</div>
          <div class="col-sm-6">Description</div>
          <div class="col-sm-2">Apply</div>
        </div>
        <!-- Current Openings List-->
        <!-- Job-->
        <div class="job-list">

          <!-- intéraction avec la base de donnée -->
          <?php
          $conn = new mysqli("localhost", "root", "", "recrutementBD");

          if ($conn->connect_error) {
              die("Désolé nous n'avons pas reussi à établir une connexion avec la base de donnée: " . $conn->connect_error);
          }
          $sql = "SELECT * FROM jobs";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              for ($i = 0; $i < $result->num_rows; $i++) {
                  $job = $result->fetch_assoc();
                  ?>
                  <div class="job-single">
                      <div class="col-sm-4">
                          <h4 class="job-title"><?= $job['titre'] ?></h4>
                          <span class="job-date"><?= $job['date'] ?></span>
                      </div>
                      <div class="col-sm-6">
                          <p style="overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;"><?= $job['description'] ?></p>
                      </div>
                      <div class="col-sm-2">
                      <a class="konnect-button-2" href="apply-job.php?job_titre=<?= urlencode($job['titre']) ?>">Apply</a>
                      </div>
                  </div>
                  <?php
              }
          } else {
              echo "Aucun results, pas d'emplois pour le moment.";
          }

          $conn->close();
          ?>
        </div>
        
        <!-- Pagination -->
        <!-- <ul class="pagination">
          <li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
          <li><a href="#">1</a></li>
          <li class="active"><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
        </ul> -->
      </div>
    </div>
  </section>
  <!--Call To Action-->
  <aside class="dark-bg">
    <div class="container text-center">
      <div class="row">
        <div class="col-12 text-center text-white">
          <h3 class="margin-0">Want to Get in Touch with us <a href="#" class="konnect-button-3">Submit Your Query</a></h3>
        </div>
      </div>
    </div>
  </aside>
  <!--Contact Us-->
  <section class="footer-contact">
    <div class="container">
      <div class="row">
      <!-- About Us-->
        <div class="col-md-3 col-sm-6 footer-box"> <img src="img/icons/building.png" alt="icon" class="konnect-contact-icon">
          <h3>About <span class="color-default">Us</span></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        
        <!-- Address-->
        <div class="col-md-3 col-sm-6 footer-box"> <img src="img/icons/location.png" alt="icon" class="konnect-contact-icon">
          <h3>Our <span class="color-default">Location</span></h3>
          <p>#Koramangala, Banglore<br>
            Karnataka, INDIA</p>
        </div>
        
        <!--     Phone Numbers-->
        <div class="col-md-3 col-sm-6 footer-box"> <img src="img/icons/phone.png" alt="icon" class="konnect-contact-icon">
          <h3>Phone <span class="color-default">Contact</span></h3>
          <p>+91 123-456789<br>
            +91 123-456780</p>
        </div>
        
        <!-- Email Details -->
        <div class="col-md-3 col-sm-6 footer-box"> <img src="img/icons/email.png" alt="icon" class="konnect-contact-icon">
          <h3>Email <span class="color-default">Us</span></h3>
          <p>info@konnectplugins.com<br>
            sales@konnectplugins.com</p>
        </div>
      </div>
    </div>
  </section>
  <!--Back To Top--> 
  <span id="back-to-top" class="back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><i class="fa fa-angle-double-up" aria-hidden="true"></i></span><!--Main Footer-->

  <footer class="konnect-info">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-xs-12 text-left"> 
          
          <!--Footer Social Icons-->
          <div class="contact-social">
            <p><a href="#"> <i class="fa fa-twitter"></i> </a> <a href="#"> <i class="fa fa-facebook"></i> </a> <a href="#"> <i class="fa fa-google-plus"></i> </a> <a href="#"> <i class="fa fa-rss"></i> </a> <a href="#"> <i class="fa fa-instagram"></i> </a></p>
          </div>
        </div>
        
        <!-- Footer Copy rights-->
        <!-- <div class="col-sm-6 col-xs-12 text-right">
          <p> &copy; Copyright 2016  Konnect plugins </p>
        </div> -->
      </div>
    </div>
  </footer>
  <!-- jQuery --> 

  <script src="assets/jquery/jquery.min.js"></script> 

  <!-- Bootstrap Core JavaScript --> 
  <script src="assets/bootstrap/js/bootstrap.min.js"></script> 

  <!-- Theme JavaScript --> 
  <script src="js/default.js"></script>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','../../www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-77800499-1', 'auto');
    ga('send', 'pageview');

  </script>
</body>

</html>
