<?php
session_start();

// ⏱ 10 minutes = 600 seconds
$timeout_duration = 600;

// 🧠 Check session last activity
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    // ❌ Time over → session destroy + redirect to login
    session_unset();
    session_destroy();
    header("Location: login.php?timeout=1");
    exit();
}

// ✅ Update last activity time
$_SESSION['LAST_ACTIVITY'] = time();

// 👇 Your normal session check (to make sure user is logged in)
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>
<html lang="en">
<head>
<link rel="stylesheet" href="css/style.css"
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quick Courier Service</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" >
  <style>
  html{
  overflow-x:hidden;
  }
    #location{
	border: 1px solid #777;
	background-color:gray;
	margin-left:600px;
	margin-right:570px;
	border-radius:10px;
	color:white;
	}
	.card-img-top{
	border-radius:20px;
	mar
	}	
	h1.name{
	border: 1px solid #777;
	background-color:cornsilk;
	margin-top:12px;
	margin-left:5px;
	border-radius:15px;
	padding:3px;
	color:black;
	font-size:16px;
	}
	h1.name:hover{
	color:white;
	background-color:blue;
	cursor:pointer;
	}
	a{
    text-decoration: none;
    }
	.space{
	justify-self: anchor-center;
	}
	.footer{
	background-color:gray !important;
	}
	.nav{
	background-color:gray !important;
	}
	.nav-link{
	color:white !important;
	font-size:20px !important;
	padding
	}
	.nav-link:hover {
      background-color:white !important;
	  color:black !important;
	  border-radius:10px !important;
	  }
.logout-link {
  color: #e74c3c !important;          /* Red color */
  cursor: pointer;                    /* Pointer on hover */
  font-weight: bold;
  background-color: transparent;      /* Default background */
  transition: background-color 0.2s ease, color 0.2s ease;
}
/* 👇 Hover effect */
.logout-link:hover {
  background-color: #532ce0ff !important; /* Light red background */
  color: #118585ff !important;            /* Darker red text */
}
	  body{
	  background-color:lavender;
	  }
	  .logo{
	  margin-left:10px;
	  border-radius:22px;
	  }
	  .nav_option{
	  margin-left:540px;
	  }
	  #about{
	color:black;
	border: 1px solid #ddd;;
	background-color:lightblue;
	margin-left:550px;
	margin-right:600px;
	border-radius:10px;
	padding:10px;
	}
	  .aboutus {
  font-family: Arial, sans-serif;
  font-size: 20px;
  color: #333;
  line-height: 1.6;
  max-width: 1200px;
  margin: 50px auto;
  padding: 20px;
  background: white;
  border-radius: 10px;
}

.aboutus img.a {
  float: left; /* or right if you want the image on the right side */
  width: 500px;
  height: 250px;
  margin: 0 20px 20px 0;
  border-radius: 10px;
}
.aboutus li {
	margin-left:200px;	
	margin-right:380px;
	color:blue;
	list-style-type:'🚚 ';
	padding:0px;
	font-size:25px;
	background-color:lightskyblue;
	margin-bottom: 10px;
	border-radius:10px;
	border:0px;
}
.text-white:hover{
color:black;
background-color:blue;
}
span{
  text-indent: 50px;
}
.card{
border-radius:20px;
}
  </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light nav"
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <img class="logo" src="
      Images/courier_logo.png" alt="Logo" width="50px" height="50px">
     <h1  class="name"> <span>QUICK COURIER SERVICE</span></h1>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
      <ul class="navbar-nav me-auto nav_option mb-2 mb-lg-0 ">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="user_page.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About-us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Booking
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="ship.php">Ship Now</a></li>
            <li><a class="dropdown-item" href="track_form.php">Tracking Your Shipment</a></li>
            <li><a class="dropdown-item" href="history.php">My Shipments</a></li>
            <li><a class="dropdown-item" href="track_bill.php">Track Shipment Bill</a></li>
			      <li><a class="dropdown-item" href="cancel.php">Shipment Cancel</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#location">Locations</a>
        </li> 
		<li class="nav-item">
          <a class="nav-link" href="feedback_form.php">Feedback</a>
        </li>
      </ul>
<?php
$user_letter = isset($_SESSION['user']) ? strtoupper(substr($_SESSION['user'], 0, 1)) : null;
$name = isset($_SESSION['user']) ? $_SESSION['user'] : null;
?>
<ul class="navbar-nav ms-auto mb-2 mb-lg-0"> <!-- ms-auto pushes to right -->

  <?php if ($name): ?>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <div style="
          width: 35px;
          height: 35px;
          background-color: #007bff;
          color: white;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
          box-shadow: 0 0 5px rgba(0,0,0,0.2);
        ">
          <?php echo $user_letter; ?>
        </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
        <li>
          <span class="dropdown-item-text text-start" style="color: #333; font-weight: bold;">
            <?php echo $name; ?>
          </span>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <a class="dropdown-item" href="logout.php" style="color: #e74c3c; cursor: pointer;">
            🚪 Logout
          </a>
        </li>
      </ul>
    </li>
  <?php else: ?>
    <li class="nav-item">
      <a class="nav-link logout-link" href="login.php">Login</a>
    </li>
  <?php endif; ?>

</ul>
  </div>
</nav><br>
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
	<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="Images/courier_image_1.jpg" class="d-block" width="100%" height="400px" alt="...">
    </div>
    <div class="carousel-item">
      <img src="Images/courier_image_2.jpg" class="d-block" width="100%" height="400px" alt="...">
    </div>
    <div class="carousel-item">
      <img src="Images/courier_image_3.jpg" class="d-block" width="100%" height="400px" alt="...">
    </div>
	<div class="carousel-item">
      <img src="Images/courier_image_4.jpg" class="d-block" width="100%" height="400px" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div><br><br>
<h1 id="about"><b>About-Us</b></h1>
<div class="aboutus">
<span><p><img class='a'  src="Images/about_us.jpg" alt='Quick Courier' style="width:500px; height:280px; margin-left:15px; border:black; border-radius:10px;">At <b>Quick Courier</b>, we believe in delivering more than just packages - we deliver trust, speed, and reliability. Founded with the goal of providing seamless and secure courier services, we have quickly grown into a name customers can count on.</p></span>
<span><p>Whether it's important business documents, personal parcels, or last-mile deliveries, <b>Quick Courier </b>ensures your items reach their destination on time, every time. With a dedicated team, real-time tracking, and a customer-first approach, we make logistics simple and stress-free.</p></span>
<b><p style="font-size:18px; font-weight:bold; color:#0056b3";>✨ <u>Why Choose to Use Quick Courier:</u></b></p>
<ol>
<li>Same-day and next-day delivery</li>
<li>Intercity and intracity courier services</li>
<li>Pickup and drop across Tamil Nadu and beyond</li>
<li>Secure packaging and tracking support</li>
</ol><br>
<p style="font-family: Arial, sans-serif; font-size: 20px;">We are proud to serve individuals, small businesses, and large enterprises with the same level of commitment and care.<br>
Choose Quick Courier — Because Every Second Counts.<br></p>
<p>📦 <b>Fast</b> &nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp; &nbsp;&nbsp;<b> 🔐 Safe</b> &nbsp;&nbsp;&nbsp;&nbsp; |&nbsp; &nbsp;&nbsp;&nbsp;<b> 📍 On-Time</b></p>
</div>
<h1 id="location"><b>Locations</b></h1>
<div class="row row-cols-1 row-cols-md-3 g-4 container-fluid space">
  <div class="col">
    <div class="card">
      <a href="https://maps.app.goo.gl/7mkVo3fz6UQ4hQko7" target="_blank">
	  <img src="Images/trichy_image.jpg"  class="card-img-top" width="275px" height="183px" alt="trichy image"></a>
      <div class="card-body">
        <h5 class="card-title">Tiruchirappalli</h5>
        <p class="card-text">Fast and reliable courier services across all areas in Tiruchirappalli including Srirangam, Cantonment, and Thillai Nagar.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
	<a href="https://maps.app.goo.gl/uZ1dKiTXQB8Q85ig9" target="_blank">
      <img src="Images/chennai_image.jpg" class="card-img-top" width="275px" height="183px" alt ="chennai"></a>
      <div class="card-body">
        <h5 class="card-title">Chennai</h5>
        <p class="card-text">Delivering express parcels in all zones of Chennai including T. Nagar, Velachery, Anna Nagar, and OMR corridor.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
	<a href="https://maps.app.goo.gl/x4kwkoDVnPjVHHdEA" target="_blank">
      <img src="Images/madurai_image.jpg" class="card-img-top" width="275px" height="183px" alt="madurai image"></a>
      <div class="card-body">
        <h5 class="card-title">Madurai</h5>
        <p class="card-text">Quick Courier serves all parts of Madurai, from Meenakshi Amman Temple area to Thirunagar and Anna Bus Stand.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
	<a href="https://maps.app.goo.gl/qGVLjSU79LrMpDfy7" target="_blank">
      <img src="Images/covai_image.jpg" class="card-img-top" width="275px" height="183px" alt="covai image"></a>
      <div class="card-body">
        <h5 class="card-title">Coimbatore</h5>
        <p class="card-text">Efficient parcel delivery to Peelamedu, Gandhipuram, RS Puram, and other key areas in Coimbatore city.</p>
      </div>
    </div>
  </div>  
  <div class="col">
    <div class="card">
	<a href="https://maps.app.goo.gl/x4kwkoDVnPjVHHdEA" target="_blank">
      <img src="Images/karur_image.jpg" class="card-img-top" width="275px" height="183px" alt="madurai image"></a>
      <div class="card-body">
        <h5 class="card-title">Karur</h5>
        <p class="card-text">Reliable courier service for Karur town and surrounding areas like Gandhigramam and LGB Nagar.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
	<a href="https://maps.app.goo.gl/qGVLjSU79LrMpDfy7" target="_blank">
      <img src="Images/selam_image.jpg" class="card-img-top" width="275px" height="183px" alt="covai image"></a>
      <div class="card-body">
        <h5 class="card-title">Selam</h5>
        <p class="card-text">Fast pickup and delivery across Salem including Hasthampatti, Shevapet, and Ammapet regions.</p>
      </div>
    </div>
  </div>
</div><br><br>
<footer class="bg-primary text-white text-center text-lg-start mt-5">
  <div class="container-fluid p-4">
    <div class="row text-start">

      <!-- Column 1 -->
      <div class="col-12 col-md-3 mb-4">
        <h5 class="text-uppercase fw-bold mb-3" style="color: black;">QUICK COURIER SERVICE</h5>
        <ul class="list-unstyled">
          <li>Same-day and next-day delivery</li>
          <li>Intercity and intracity courier services</li>
          <li>Pickup and drop across Tamil Nadu</li>
          <li>Secure packaging and tracking</li>
        </ul>
      </div>

      <!-- Column 2 -->
      <div class="col-12 col-md-3 mb-4">
        <h5 class="text-uppercase fw-bold mb-3" style="color: black;">INFO</h5>
        <ul class="list-unstyled">
          <li><a href="user_page.php" class="text-white text-decoration-none">Home</a></li>
          <li><a href="#about" class="text-white text-decoration-none">About-us</a></li>
          <li><a href="user_page.php" class="text-white text-decoration-none">Booking</a></li>
          <li><a href="#location" class="text-white text-decoration-none">Location</a></li>
          <li><a href="login.php" class="text-white text-decoration-none">Login</a></li>
        </ul>
      </div>

      <!-- Column 3 -->
      <div class="col-12 col-md-3 mb-4">
        <h5 class="text-uppercase fw-bold mb-3" style="color: black;">SUB LINKS</h5>
        <ul class="list-unstyled">
          <li><a href="track_form.php" class="text-white text-decoration-none">Tracking Status</a></li>
          <li><a href="ship.php" class="text-white text-decoration-none">Ship Now</a></li>
          <li><a href="cancel.php" class="text-white text-decoration-none">Shipment Cancel</a></li>
        </ul>
      </div>

      <!-- Column 4 -->
      <div class="col-12 col-md-3 mb-4">
        <h5 class="text-uppercase fw-bold mb-3" style="color: black;">SOCIAL MEDIA</h5>
        <ul class="list-unstyled">
          <li><a href="https://wa.me/919003334735" target="_blank" class="text-white text-decoration-none">WhatsApp</a></li>
          <li><a href="https://www.instagram.com/silentbala4735/" target="_blank" class="text-white text-decoration-none">Instagram</a></li>
          <li><a href="#" class="text-white text-decoration-none">Facebook</a></li>
          <li><a href="#" class="text-white text-decoration-none">YouTube</a></li>
        </ul>
      </div>

    </div>
  </div>

  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2025 Quick Courier Service PVT.LTD.
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
 </body>
 </html>