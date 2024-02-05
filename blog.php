<?php
include 'dbconn.php';

try {
  $pdo = new PDO('mysql:host=localhost;dbname=mobizz_eng', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $pdo->prepare("SELECT `index`,`image`,`main_title`,`sub_title`,`date` FROM blog");
  $stmt->execute();
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Mobizz Engineering</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

    <style>
        body {
            background-color: #d6d6d6;
            font-family: 'Roboto', sans-serif;
        }

        .navbar.navbar-expand-lg.bg-white .navbar-toggler-icon {
            color: #C4B0FF;
        }

        .navbar.navbar-expand-lg.bg-white .navbar-collapse {
            background-color: #9AC5F4;
        }

        .ftco-section {
            padding: 4rem 0;
        }

        .heading-section {
            margin-bottom: 2rem;
        }

        .meta-date {
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
        }

        .blog-entry {
            margin-bottom: 30px;
        }

        .btn-square {
            width: 40px;
            height: 40px;
            font-size: 18px;
            line-height: 40px;
        }

        input[type="text"] {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 8px;
        }

        .back-to-top {
            padding: 10px;
        }
        .blog-entry {
            height: 100%;
            overflow: hidden;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .text h3 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin: 0;
            margin-bottom: 8px;
        }

        .text p {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin: 0;
        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white">
        <a href="index.html" class="navbar-brand ps-5 me-0">
            <img class="w-100" src="img/logo.png" alt="Image">
            <h5 style="text-align: center; color: #2f89fc; font-size: 2.5rem;">Mobizz <span class="text-warning" style="font-size: 2.0rem;">Engineering</span></h5>
        </a>
        <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="service.html" class="nav-item nav-link">Services</a>                
                <a href="blog.php" class="nav-item nav-link active">Blog</a>
                <a href="FAQ.php" class="nav-item nav-link">FAQ</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-3 text-white animated slideInRight">Blogs</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb animated slideInRight mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>                   
                    <li class="breadcrumb-item active" aria-current="page">Blog</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <p class="fw-medium text-uppercase text-primary mb-2">Our Blogs</p>
            <h1 class="display-5 mb-4">We Provide Best Information</h1>
        </div>

        <div class="row">
            <?php foreach ($result as $row) : ?>
                <div class="col-md-4 ftco-animate">
                    <div class="blog-entry">
                        <img src="<?php echo 'Mobizzengineering_Portal/pages/Blog/display_blog.php?id=' . $row['index']; ?>" class="card-img-top" alt="..." style="max-height: 30vh; width: 100%; object-fit: cover;">
                        <div class="text bg-white p-4">
                            <h3 class="heading"><a href="blog.html" style="color: rgb(30, 30, 85);"><?php echo $row['main_title']; ?></a></h3>
                            <p><?php echo $row['sub_title']; ?></p>
                            <span class="date text-primary"><?php echo $row['date']; ?></span>
                            <div class="d-flex align-items-center mt-4">
                                <p class="mb-0" style="margin-right: 25px;">
                                    <a href="blog_page.php?id=<?php echo $row['index']; ?>" class="btn btn-primary">Read More <span class="bi bi-arrow-right"></span></a>
                                </p>
                                <p class="ml-2 mb-0">
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="bi bi-chat"></span> 3</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

    <!-- Service End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Our Office</h5>
                    <p class="mb-2"><i class="bi bi-geo-alt-fill me-3"></i>91,/1 GalleRoad,Colombo4</p>
                    <p class="mb-2"><i class="bi bi-phone-fill me-3"></i>+9477-334-7112</p>
                    <p class="mb-2"><i class="bi bi-envelope-fill me-3"></i>Engineering@mobizz.lk</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-primary rounded-circle me-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href="#"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href="#"><i class="fab fa-linkedin-in"></i></a>
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
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Saturday-Sunday</p>
                    <h6 class="text-light">Closed</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Newsletter</h5>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container text-center">
            <p class="mb-2">Copyright &copy; <a class="fw-semi-bold" href="#">MOBIZZ ENGINEERING</a>, All Right Reserved.</p>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <script src="js/main.js"></script>
</body>
</html>