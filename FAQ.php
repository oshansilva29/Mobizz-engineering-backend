<!DOCTYPE html>
<html lang="en">

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

    .accordion-item{
        margin-bottom: 1rem;
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
                <a href="FAQ.php" class="nav-item nav-link">FAQ</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <!--<a href="" class="btn btn-primary px-3 d-none d-lg-block">Get A Quote</a>-->
        </div>
    </nav><!-- Navbar End -->

    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">FAQ</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active" aria-current="page">FAQ</li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="fw-medium text-uppercase text-primary mb-2" style="color: #14305a;">Our FAQ</p>
                <h1 class="display-5 mb-4" style="color: #14305a;">Frequently Asked Questions</h1>
            </div>
    
           <!-- Your HTML code before displaying FAQ items -->

<div class="accordion" id="faqAccordion">

<?php
// Include your database connection code here
Include"dbconn.php";

// Fetch FAQ entries from the database
$sql = "SELECT question, answer FROM faq WHERE status = 'active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $count = 1;
    while ($row = $result->fetch_assoc()) {
        $question = $row["question"];
        $answer = $row["answer"];

        // Dynamically generate HTML for each FAQ item
        echo '<div class="accordion-item">';
        echo '<h2 class="accordion-header" id="faqItem' . $count . '">';
        echo '<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse' . $count . '" aria-expanded="false" aria-controls="faqCollapse' . $count . '" style="background-color: #14305a; color: #fff;">';
        echo 'Question ' . $count . ': ' . $question;
        echo '</button>';
        echo '</h2>';
        echo '<div id="faqCollapse' . $count . '" class="accordion-collapse collapse" aria-labelledby="faqItem' . $count . '">';
        echo '<div class="accordion-body">';
        echo $answer;
        echo '</div>';
        echo '</div>';
        echo '</div>';
        $count++;
    }
} else {
    echo "No FAQ entries found.";
}

$conn->close();
?>

</div>
</div>
</div>
<!-- Your HTML code after displaying FAQ items --> 
    <div style="text-align: center; justify-content: center;">
        <span style="color: #14305a; text-align: center; justify-content: center;">If you have any problem, ask us without hesitation,</span><a href="contact.html">
            Contact us
        </a>
    </div>
<!-- Footer Strat -->
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