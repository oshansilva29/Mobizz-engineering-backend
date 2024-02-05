<!DOCTYPE html>
<html lang="en">
<?php
Include"dbconn.php";
// Step 2: Retrieve Data
$sql = "SELECT ID, Title, img_path FROM bannerhead";
$query2 = "SELECT * FROM project";
$query3 = "SELECT * FROM home_about WHERE status = 'active'";
$query4 = "SELECT id, reason_title, reason_description FROM reason WHERE status = 'active'";
$query5="SELECT id, experience_years, people_count, partners_count, projects_completed, is_active FROM company_stats WHERE is_active = 1";

// Step 3: Execute Querie
$result = $conn->query($sql);
$result2 = $conn->query($query2);
$result3 = $conn->query($query3);
$result4 = $conn->query($query4);
$result5 = $conn->query($query5);

// Step 4: Fetch and Display Data
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
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
   

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white ">
        <a href="index.html" class="navbar-brand ps-5 me-0">
            <img class="w-100" src="img/logo.png" alt="Image">
            <h5 style="text-align: center; color: #2f89fc; font-size: 2.5rem;">Mobizz <span class="text-warning" style="font-size: 2.0rem;">Engineering</span></h5>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="about.php" class="nav-item nav-link">About Us</a>
                <a href="service.html" class="nav-item nav-link">Services</a>
                <a href="blog.php" class="nav-item nav-link">Blog</a>
                <a href="FAQ.php" class="nav-item nav-link">FAQ</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

<?php
if ($result->num_rows > 0) {
    echo '<div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">';

    $active = true;

    while ($row = $result->fetch_assoc()) {
        // Debugging: Display image paths
        
        echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">
                <img class="w-100" src="./img/banner1.webp" alt="" style="width: 100%; height: 500px;">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 text-start">
                                <h5 class="display-1 text-white mb-5 animated slideInRight">' . $row['Title'] . '</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

        $active = false;
    }

    echo '</div></div>';
} else {
    echo "No projects found.";
}
?>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row gx-3 h-100">
                        <div class="col-6 align-self-start wow fadeInUp" data-wow-delay="0.1s">
                            <img class="img-fluid" src="img/worker.jpg" style="border: 2px solid #9f9393;">

                        </div>
                        <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                            <img class="img-fluid" src="img/twr.jpg" style="border: 2px solid #9f9393;">
                        </div>
                    </div>
                </div>

                <?php
// Display projects
if ($result3->num_rows > 0) {
    echo '<div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
        <p class="fw-medium text-uppercase text-primary mb-2">About Us</p>';

    while ($row = $result3->fetch_assoc()) {
        echo ' <h1 class="display-5 mb-4">' . $row['heading'] .'</h1>
               <p class="mb-4">
                  <p style="text-align: left;">  ' . $row['paragraph'] . '
                </p>';
    }

    echo '</div></div>';
} else {
    echo "No projects found.";
}?>
                    </div>
                    <div class="row pt-2">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-envelope-open text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Email us</p>
                                    <h5 class="mb-0">Engineering@mobizz.lk</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                    <i class="fa fa-phone-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <p class="mb-2">Call us</p>
                                    <h5 class="mb-0">+9477-334-7112</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
        <?php
// Display projects
if ($result5->num_rows > 0) {
    echo '<div class="container-fluid facts my-5 p-5">
        <div class="row g-5">
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="text-center border p-5">
                    <i class="fa fa-certificate fa-3x text-white mb-3"></i>';

    while ($row = $result5->fetch_assoc()) {
        echo ' <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">' . $row['experience_years'] .'</h1>;
                 <span class="fs-5 fw-semi-bold text-white">Years Experience</span>
                </div>
            </div>
             <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="text-center border p-5">
                    <i class="fa fa-users-cog fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">'.$row['people_count']  .'</h1>
                    <span class="fs-5 fw-semi-bold text-white">Our People</span>
                </div>
            </div>
             <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="text-center border p-5">
                    <i class="fa fa-users fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">' .$row['partners_count'] .'</h1>
                    <span class="fs-5 fw-semi-bold text-white">Valued Partness</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="text-center border p-5">
                    <i class="fa fa-check-double fa-3x text-white mb-3"></i>
                    <h1 class="display-2 text-primary mb-0" data-toggle="counter-up">'.$row['projects_completed'].'</h1>
                    <span class="fs-5 fw-semi-bold text-white">Projects Completed</span>
                </div>
            </div>
        </div>
    </div>';
    }

    echo '</div></div>';
} else {
    echo "No projects found.";
}?>


    <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative me-lg-4">
                        <img class="img-fluid w-100" src="img/computer.jpg" style="border: 5px solid #9f9393 ;" alt="">

                    </div>
                </div>


                <?php
// Display projects
if ($result4->num_rows > 0) {
    echo '<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <p class="fw-medium text-uppercase text-primary mb-2">Why Choosing Us!</p>';

    while ($row = $result4->fetch_assoc()) {
        echo '<h1 class="display-5 mb-4">' . $row['reason_title'] .'</h1>
               <p class="mb-4">
                  <p style="text-align: left;">  ' . $row['reason_description'].'</p>';
    }

    echo '</div></div>';
} else {
    echo "No Data found.";
}?>

            </div>
        </div>
    </div>
    <!-- Features End -->


    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2">Our Services</p>
                <h1 class="display-5 mb-4">We Provide Best Industrial Services</h1>
            </div>
            <div class="row gy-5 gx-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item">
                        <img class="img-fluid" src="img/service-1.jpg" alt="">
                        <div class="service-img">
                            <img class="img-fluid" src="img/3242288-200.png" alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0">Telecommunication Technical Services</h3>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0">
                                    <ul>
                                        <li style="color: white; font-weight: bold;">Telecommunication Network Managed Services</li>
                                        <li  style="color: white; font-weight: bold;">Network Implementation Services</li>
                                        <li style="color: white; font-weight: bold;">Radio Netowrk Planning & Optimization</li>
                                        <li style="color: white; font-weight: bold;">Customer compliant Technical Analysis & Troubleshooting</li>

                                    </ul>
                                </p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="TecnicalServices.php">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item">
                        <img class="img-fluid" src="img/enterprice.jpg" alt="">
                        <div class="service-img">
                            <img class="img-fluid" src="img/3850572-200.png" alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0">Enterprice Solutions</h3>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0"><ul >
                                    <li style="color: white; font-weight: bold;">ICT Network Implementation & Maintenance</li>
                                    <li style="color: white; font-weight: bold;">Technical Consultancy Services</li>
                                    <li style="color: white; font-weight: bold;">IOT based Product Distribution Services</li>
                                </ul>
                                </p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="Enterprisesolution.php">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item">
                        <img class="img-fluid" src="img/web3.webp" alt="">
                        <div class="service-img">
                            <img class="img-fluid" src="img/software-development.png" alt="">
                        </div>
                        <div class="service-detail">
                            <div class="service-title">
                                <hr class="w-25">
                                <h3 class="mb-0">Software Solutions</h3>
                                <hr class="w-25">
                            </div>
                            <div class="service-text">
                                <p class="text-white mb-0">
                                    <ul>
                                        <li style="color: white; font-weight: bold;">Enterprise IT & Software Solutions<li>
                                        <li style="color: white; font-weight: bold;">Customized Product Development</li>
                                        <li style="color: white; font-weight: bold;">Banking Software System Development & Maintenance</li>
                                     </ul>
                                 </p>
                            </div>
                        </div>
                        <a class="btn btn-light" href="softwaresolution.php">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Project Start -->
 
<!--<?php
// Display projects
if ($result2->num_rows > 0) {
    echo '<div class="container-fluid bg-dark pt-5 my-5 px-0">
            <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Our Projects</p>
                <h1 class="display-5 text-white mb-5">Our Projects</h1>
            </div>
            <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">';

    while ($row = $result2->fetch_assoc()) {
        echo '<a class="project-item" href="">
                <img class="img-fluid" src="' . $row['image_path'] . '" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">' . $row['project_title'] . '</h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img class="img-fluid" src="'.$row['image_path'].'" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">'.$row['project_title'].'"</h5>
                </div>
            </a>
             <a class="project-item" href="">
                <img class="img-fluid" src="'.$row['image_path'].'" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">'.$row['project_title'].'"</h5>
                </div>
            </a>';
    }

    echo '</div></div>';
} else {
    echo "No projects found.";
}?>-->
 <div class="container-fluid bg-dark pt-5 my-5 px-0">
        <div class="text-center mx-auto mt-5 wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Our Projects</p>--
            <h1 class="display-5 text-white mb-5">Our Projects</h1>
        </div>
        <div class="owl-carousel project-carousel wow fadeIn" data-wow-delay="0.1s">

            <a class="project-item" href="">
                <img class="img-fluid" src="img/customercomplain.jpg" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Field maintenance Operations</h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img class="img-fluid" src="img/solor.jpg" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Solar Power Installation</h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img class="img-fluid" src="img/field.jpg" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Customer Complaint Analysis</h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img class="img-fluid" src="img/technicalequipment.jpg" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Telecom Equipment Installation</h5>
                </div>
            </a>
            <a class="project-item" href="">
                <img class="img-fluid" src="img/wifi.webp" alt="">
                <div class="project-title">
                    <h5 class="text-primary mb-0">Wi-Fi Network Maintenance</h5>
                </div>
            </a>
        </div>
    </div>
  
    <!-- Project End -->




    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Our Office</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>91/1 GalleRoad,Colombo4</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+9477-334-7112</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>Engineering@mobizz.lk</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i
                                class="fab fa-twitter"></i></a>
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
<?php
// Close the database connection
$conn->close();
?>