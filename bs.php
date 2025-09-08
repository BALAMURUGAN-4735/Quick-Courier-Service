<?php
session_start();

$user_name = isset($_SESSION['user']) ? $_SESSION['user'] : null;
$user_letter = "👤";
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
	font-size:20px;
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
  line-height: 1.5;
  max-width: 90vw;
  height:100vh;
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
          <a class="nav-link active" aria-current="page" href="bs.php">Home</a>
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
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
  <!-- Profile Icon -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <div style="
        width: 35px;
        height: 35px;
        background-color: #a9d0faff;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        box-shadow: 0 0 5px rgba(0,0,0,0.2);
      ">
        <?php echo $user_letter; ?>
      </div>
    </a>

    <!-- Dropdown -->
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
        <li><a class="dropdown-item" href="signup.php">📝 Register</a></li>
        <li><a class="dropdown-item" href="login.php">🔑 Login</a></li>
    </ul>
  </li>
</ul>
  </ul>
</li>
</ul>
  </div>
</nav>
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
</div><br>
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
<footer class="bg-primary text-white text-center text-lg-start footer">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
	<!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h5 style="color:black" class="text-uppercase fw-bold mb-4 ">
            <i class="fas fa-gem me-3"></i>QUICK COURIER SERVICE
          </h5>
          <p>
            <ol>
             <li>Same-day and next-day delivery</li>
             <li>Intercity and intracity courier services</li>
             <li>Pickup and drop across Tamil Nadu and beyond</li>
             <li>Secure packaging and tracking support</li>
            </ol>
          </p>
        </div><br><br>
      <!-- Grid column -->
		
      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 style="color:black" class="text-uppercase fw-bold mb-4">Info</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a href="bs.php" class="text-white">Home</a>
          </li>
          <li>
            <a href="#about" class="text-white">About-us</a>
          </li>
          <li>
            <a href="bs.php" class="text-white">Booking</a>
          </li>
          <li>
            <a href="#location" class="text-white">Location</a>
          </li>
		  <li>
            <a href="login.php" class="text-white">Login</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->
	  
	  <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 style="color:black" class="text-uppercase fw-bold mb-4">Sub Links</h5>

        <ul class="list-unstyled mb-0">
          <li>
            <a href="track_form.php" class="text-white">Tracking Status</a>
          </li>
          <li>
            <a href="ship.php" class="text-white">Ship Now</a>
          </li>
          <li>
            <a href="cancel.php" class="text-white">Shipment Cancel</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 style="color:black" class ="text-uppercase fw-bold mb-4">SOCIAL MEDIa</h5>

        <ul class="list-unstyled">
          <li>
           <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 258"><defs><linearGradient id="logosWhatsappIcon0" x1="50%" x2="50%" y1="100%" y2="0%"><stop offset="0%" stop-color="#1faf38"/><stop offset="100%" stop-color="#60d669"/></linearGradient><linearGradient id="logosWhatsappIcon1" x1="50%" x2="50%" y1="100%" y2="0%"><stop offset="0%" stop-color="#f9f9f9"/><stop offset="100%" stop-color="#fff"/></linearGradient></defs><path fill="url(#logosWhatsappIcon0)" d="M5.463 127.456c-.006 21.677 5.658 42.843 16.428 61.499L4.433 252.697l65.232-17.104a123 123 0 0 0 58.8 14.97h.054c67.815 0 123.018-55.183 123.047-123.01c.013-32.867-12.775-63.773-36.009-87.025c-23.23-23.25-54.125-36.061-87.043-36.076c-67.823 0-123.022 55.18-123.05 123.004"/><path fill="url(#logosWhatsappIcon1)" d="M1.07 127.416c-.007 22.457 5.86 44.38 17.014 63.704L0 257.147l67.571-17.717c18.618 10.151 39.58 15.503 60.91 15.511h.055c70.248 0 127.434-57.168 127.464-127.423c.012-34.048-13.236-66.065-37.3-90.15C194.633 13.286 162.633.014 128.536 0C58.276 0 1.099 57.16 1.071 127.416m40.24 60.376l-2.523-4.005c-10.606-16.864-16.204-36.352-16.196-56.363C22.614 69.029 70.138 21.52 128.576 21.52c28.3.012 54.896 11.044 74.9 31.06c20.003 20.018 31.01 46.628 31.003 74.93c-.026 58.395-47.551 105.91-105.943 105.91h-.042c-19.013-.01-37.66-5.116-53.922-14.765l-3.87-2.295l-40.098 10.513z"/><path fill="#fff" d="M96.678 74.148c-2.386-5.303-4.897-5.41-7.166-5.503c-1.858-.08-3.982-.074-6.104-.074c-2.124 0-5.575.799-8.492 3.984c-2.92 3.188-11.148 10.892-11.148 26.561s11.413 30.813 13.004 32.94c1.593 2.123 22.033 35.307 54.405 48.073c26.904 10.609 32.379 8.499 38.218 7.967c5.84-.53 18.844-7.702 21.497-15.139c2.655-7.436 2.655-13.81 1.859-15.142c-.796-1.327-2.92-2.124-6.105-3.716s-18.844-9.298-21.763-10.361c-2.92-1.062-5.043-1.592-7.167 1.597c-2.124 3.184-8.223 10.356-10.082 12.48c-1.857 2.129-3.716 2.394-6.9.801c-3.187-1.598-13.444-4.957-25.613-15.806c-9.468-8.442-15.86-18.867-17.718-22.056c-1.858-3.184-.199-4.91 1.398-6.497c1.431-1.427 3.186-3.719 4.78-5.578c1.588-1.86 2.118-3.187 3.18-5.311c1.063-2.126.531-3.986-.264-5.579c-.798-1.593-6.987-17.343-9.819-23.64"/></svg> <a href="https://wa.me/919003334735" class="text-white" target="blank"> Whatsapp </a>
          </li>
          <li>
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256"><g fill="none"><rect width="256" height="256" fill="url(#skillIconsInstagram0)" rx="60"/><rect width="256" height="256" fill="url(#skillIconsInstagram1)" rx="60"/><path fill="#fff" d="M128.009 28c-27.158 0-30.567.119-41.233.604c-10.646.488-17.913 2.173-24.271 4.646c-6.578 2.554-12.157 5.971-17.715 11.531c-5.563 5.559-8.98 11.138-11.542 17.713c-2.48 6.36-4.167 13.63-4.646 24.271c-.477 10.667-.602 14.077-.602 41.236s.12 30.557.604 41.223c.49 10.646 2.175 17.913 4.646 24.271c2.556 6.578 5.973 12.157 11.533 17.715c5.557 5.563 11.136 8.988 17.709 11.542c6.363 2.473 13.631 4.158 24.275 4.646c10.667.485 14.073.604 41.23.604c27.161 0 30.559-.119 41.225-.604c10.646-.488 17.921-2.173 24.284-4.646c6.575-2.554 12.146-5.979 17.702-11.542c5.563-5.558 8.979-11.137 11.542-17.712c2.458-6.361 4.146-13.63 4.646-24.272c.479-10.666.604-14.066.604-41.225s-.125-30.567-.604-41.234c-.5-10.646-2.188-17.912-4.646-24.27c-2.563-6.578-5.979-12.157-11.542-17.716c-5.562-5.562-11.125-8.979-17.708-11.53c-6.375-2.474-13.646-4.16-24.292-4.647c-10.667-.485-14.063-.604-41.23-.604zm-8.971 18.021c2.663-.004 5.634 0 8.971 0c26.701 0 29.865.096 40.409.575c9.75.446 15.042 2.075 18.567 3.444c4.667 1.812 7.994 3.979 11.492 7.48c3.5 3.5 5.666 6.833 7.483 11.5c1.369 3.52 3 8.812 3.444 18.562c.479 10.542.583 13.708.583 40.396s-.104 29.855-.583 40.396c-.446 9.75-2.075 15.042-3.444 18.563c-1.812 4.667-3.983 7.99-7.483 11.488c-3.5 3.5-6.823 5.666-11.492 7.479c-3.521 1.375-8.817 3-18.567 3.446c-10.542.479-13.708.583-40.409.583c-26.702 0-29.867-.104-40.408-.583c-9.75-.45-15.042-2.079-18.57-3.448c-4.666-1.813-8-3.979-11.5-7.479s-5.666-6.825-7.483-11.494c-1.369-3.521-3-8.813-3.444-18.563c-.479-10.542-.575-13.708-.575-40.413s.096-29.854.575-40.396c.446-9.75 2.075-15.042 3.444-18.567c1.813-4.667 3.983-8 7.484-11.5s6.833-5.667 11.5-7.483c3.525-1.375 8.819-3 18.569-3.448c9.225-.417 12.8-.542 31.437-.563zm62.351 16.604c-6.625 0-12 5.37-12 11.996c0 6.625 5.375 12 12 12s12-5.375 12-12s-5.375-12-12-12zm-53.38 14.021c-28.36 0-51.354 22.994-51.354 51.355s22.994 51.344 51.354 51.344c28.361 0 51.347-22.983 51.347-51.344c0-28.36-22.988-51.355-51.349-51.355zm0 18.021c18.409 0 33.334 14.923 33.334 33.334c0 18.409-14.925 33.334-33.334 33.334s-33.333-14.925-33.333-33.334c0-18.411 14.923-33.334 33.333-33.334"/><defs><radialGradient id="skillIconsInstagram0" cx="0" cy="0" r="1" gradientTransform="matrix(0 -253.715 235.975 0 68 275.717)" gradientUnits="userSpaceOnUse"><stop stop-color="#fd5"/><stop offset=".1" stop-color="#fd5"/><stop offset=".5" stop-color="#ff543e"/><stop offset="1" stop-color="#c837ab"/></radialGradient><radialGradient id="skillIconsInstagram1" cx="0" cy="0" r="1" gradientTransform="matrix(22.25952 111.2061 -458.39518 91.75449 -42.881 18.441)" gradientUnits="userSpaceOnUse"><stop stop-color="#3771c8"/><stop offset=".128" stop-color="#3771c8"/><stop offset="1" stop-color="#60f" stop-opacity="0"/></radialGradient></defs></g></svg> <a href="https://www.instagram.com/silentbala4735/" class="text-white" target="blank">Instagram</a> 
          </li>
          <li>
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256"><path fill="#1877f2" d="M256 128C256 57.308 198.692 0 128 0S0 57.308 0 128c0 63.888 46.808 116.843 108 126.445V165H75.5v-37H108V99.8c0-32.08 19.11-49.8 48.348-49.8C170.352 50 185 52.5 185 52.5V84h-16.14C152.959 84 148 93.867 148 103.99V128h35.5l-5.675 37H148v89.445c61.192-9.602 108-62.556 108-126.445"/><path fill="#fff" d="m177.825 165l5.675-37H148v-24.01C148 93.866 152.959 84 168.86 84H185V52.5S170.352 50 156.347 50C127.11 50 108 67.72 108 99.8V128H75.5v37H108v89.445A129 129 0 0 0 128 256a129 129 0 0 0 20-1.555V165z"/></svg>&nbsp;<a href="#!" class="text-white">Facebook</a>
          </li>
          <li>
           <svg xmlns="http://www.w3.org/2000/svg" width="25" height="18" viewBox="0 0 256 180"><path fill="#f00" d="M250.346 28.075A32.18 32.18 0 0 0 227.69 5.418C207.824 0 127.87 0 127.87 0S47.912.164 28.046 5.582A32.18 32.18 0 0 0 5.39 28.24c-6.009 35.298-8.34 89.084.165 122.97a32.18 32.18 0 0 0 22.656 22.657c19.866 5.418 99.822 5.418 99.822 5.418s79.955 0 99.82-5.418a32.18 32.18 0 0 0 22.657-22.657c6.338-35.348 8.291-89.1-.164-123.134"/><path fill="#fff" d="m102.421 128.06l66.328-38.418l-66.328-38.418z"/></svg>&nbsp; <a href="#!" class="text-white">Youtube</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
   © 2025 Copyright: Quick Courier Service PVT.LTD.
  </div>
  <!-- Copyright -->
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
 </body>
 </html>