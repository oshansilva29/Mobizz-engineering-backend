<!DOCTYPE html>
<html lang="en">
<?php
Include"dbconn.php";

// Fetch data from the database
$sql = "SELECT  id,header,section FROM softwareproducts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $header= $row["header"];
        $section  = $row["section"];
    }
} else {
    echo "No data found";
}

$conn->close();
?>

<head>
    <meta charset="utf-8">
    <title>Mobizz engineering</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
     <style>
        body {
        background-color: #d6d6d6;
    }
          .navbar.navbar-expand-lg.bg-white .navbar-toggler-icon {
        color: #C4B0FF; /* Change this to the color you prefer */
    }

    .navbar.navbar-expand-lg.bg-white .navbar-collapse {
        background-color: #9AC5F4; /* Change this to the color you prefer */
    }
</style>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white">
        <a href="index.html" class="navbar-brand ps-5 me-0">
            <br>
          <img class="w-100" src="img/logo.png" alt="Image">
          <h5 style="text-align: center; color: #009CFF; font-weight: bold;">Mobizz Engineering</h5>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="about.php" class="nav-item nav-link active">About Us</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
               <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="blog.php" class="dropdown-item">BLog</a>
                        <a href="feature.html" class="dropdown-item">Features</a>
                        <a href="404.html" class="dropdown-item active">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->
<div>
<title>Telecommunication Technical Support Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #0077b6;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 100%;
            margin: 20px auto;
            padding: 20px;
            text-align: justify;
            align-content: center;
        }
          .container img:hover {
        transform: scale(1.1); 
        transition: transform 0.3s ease;
    }
    </style>
</head>
<body>
    <header>
        <h1><?php echo $header;?></h1>
    </header>
    <section class="container">
        <p><?php echo $section?></p>
    </section>

     <section class="container" style="display: flex; justify-content: center; align-items: center;">
        <img src="./img/pic1.jpg" alt="Sample Image 1"style="max-width: 25%; height: 10%;display: inline-block;margin-right: 20px;margin-bottom: 20px;border: 5px solid #9f9393;">
        <img src="./img/pic2.jpg" alt="Sample Image 2"style="max-width: 25%; height: 10%;display: inline-block;margin-right: 20px;margin-bottom: 20px;border: 5px solid #9f9393;">
        <img src="./img/pic3.jpg" alt="Sample Image 3"style="max-width: 25%; height: 10%;display: inline-block;margin-right: 20px;margin-bottom: 20px;border: 5px solid #9f9393;">
    </section>
     

     

</div>
</div>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Our Office</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>91/1 Galle Road,Colombo4</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+9477-334-7112</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"> </i>Engineering@mobizz.lk</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="about.php">About Us</a>
                    <a class="btn btn-link" href="contact.html">Contact Us</a>
                    <a class="btn btn-link" href="service.html">Our Services</a>
                    <a class="btn btn-link" href="contact.html">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Business Hours</h5>
                    <p class="mb-1">Monday - Friday</p>
                    <h6 class="text-light">08:30 am - 05:00 pm</h6>
                    <p class="mb-1">Saturday-Sunday</p>
                    <h6 class="text-light">Closed</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Newsletter</h5>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container text-center">
            <p class="mb-2">Copyright &copy; <a class="fw-semi-bold" href="#">MOBIZZ ENGINEERING</a>, All Right Reserved.
            </p>
            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
          <!--  <p class="mb-0">Designed By <a class="fw-semi-bold" href="https://htmlcodex.com">HTML Codex</a> Distributed
                By: <a href="https://themewagon.com">ThemeWagon</a> </p>-->
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>