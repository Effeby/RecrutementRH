<?php
$jobTitle = isset($_GET['job_titre']) ? urldecode($_GET['job_titre']) : 'Aucun poste sélectionné';
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.konnectplugins.com/recruit/apply-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jan 2024 21:38:54 GMT -->
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
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
        <li class="active"><a href="jobs.php">Offre d'emplois</a></li>
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
    <h1><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?= $jobTitle ?></h1>
  </div>
</header>

<!--Apply Job / Submit Application-->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-dark"> 
        <!--Services Heading-->
        <h2 class="section-heading text-dark">Submit <span>Your Application</span></h2>
        <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
        <div class="konnect-space"></div>
      </div>
    </div>
    <!-- Submit Application-->
    <form class="konnect-form" id="contactForm" action="process_candidature.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-6">
            <input type="text" class="form-control" id="poste_name" name="nom_poste" value="<?= $jobTitle ?>" readonly>
            <input type="text" class="form-control" id="name" name="nom_prenom" placeholder="Nom & prénom" required>
            <input type="number" class="form-control" id="phone" name="contact" placeholder="Votre numéro de téléphone" required>
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
        </div>
        <div class="col-md-6">
            <textarea class="form-control" id="comment" name="message" placeholder="Ecriver vootre message" required></textarea>
            <input type="file" name="cv" class="form-control" placeholder="ajouter votre cv">
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="konnect-submit">Submit</button>
        </div>
    </div>
</form>

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
      <div class="col-sm-6 text-left"> 
        
        <!--Footer Social Icons-->
        <div class="contact-social">
          <p><a href="#"> <i class="fa fa-twitter"></i> </a> <a href="#"> <i class="fa fa-facebook"></i> </a> <a href="#"> <i class="fa fa-google-plus"></i> </a> <a href="#"> <i class="fa fa-rss"></i> </a> <a href="#"> <i class="fa fa-instagram"></i> </a></p>
        </div>
      </div>
      
      <!-- Footer Copy rights-->
      <div class="col-sm-6 text-right">
        <p> &copy; Copyright 2016  Konnect plugins </p>
      </div>
    </div>
  </div>
</footer>
<a target="_blank" style="position:fixed; bottom: 10px; right:10px;z-index:999" href="http://www.konnectplugins.com/template/recruit-plus-staffing-and-recruiting-wordpress-theme/" rel="nofollow"><img alt="Recruit Plus Staffing and Recruiting HTML Template - 2" src="https://camo.envatousercontent.com/aa05c4cfea759a87efe38105dc0642f57c7259e7/687474703a2f2f7777772e6b6f6e6e656374706c7567696e732e636f6d2f696d616765732f77702d726563727569742e706e67"></a>
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

</script></body>

<!-- Mirrored from www.konnectplugins.com/recruit/apply-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jan 2024 21:38:54 GMT -->
</html>
