<?php
    include 'dbconn.php';

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=mobizz_eng', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $postId = $_GET['id'] ?? 0;

        $stmt = $pdo->prepare("SELECT `index`,`image`,`main_title`,`sub_title`,`date` FROM blog WHERE `index` = ?");
        $stmt->execute([$postId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            header("Location: 404page.php");
            exit();
        }

    } catch (PDOException $re) {
        echo "Error: " . $re->getMessage();
    }

    $popularPostsStmt = $pdo->prepare("SELECT `index`, `main_title` FROM blog");
    $popularPostsStmt->execute();
    $popularPosts = $popularPostsStmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $commentName = $_POST['name'];
        $commentText = $_POST['comment'];
    
        $commentStmt = $pdo->prepare("INSERT INTO comments (post_id, name, comment) VALUES (?, ?, ?)");
        $commentStmt->execute([$postId, $commentName, $commentText]);
    
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
    

        // Fetch previous comments for the specific post
        $commentFetchStmt = $pdo->prepare("SELECT name, comment FROM comments WHERE post_id = ?");
        $commentFetchStmt->execute([$postId]);
        $previousComments = $commentFetchStmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Mobizz Engineering</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap" rel="stylesheet">

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <style>
        .card-body p {
            display: -webkit-box;
            -webkit-line-clamp: 3; 
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-bottom: 1rem;
        }

        .sidebar ul.list-unstyled li {
            margin-bottom: 10px; 
        }

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

        .blog-post img {
            width: 100%;
            border-radius: 10px; 
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
        }

        .blog-post p {
            text-align: justify;
        }
        .ftco-animate {
            margin-bottom: 30px;
        }

        .blog-entry {
            position: relative;
            overflow: hidden;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .blog-entry:hover {
            transform: scale(1.05);
        }

        .text {
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
        }

        .block-20 {
            position: relative;
            height: 200px;
        }

        .block-20::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 1);
            z-index: 1;
        }

        .meta-date {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: #fff;
            z-index: 2;
        }

        .text p {
            color: #555;
        }

        .meta-chat {
            color: #555;
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
            <h1 class="display-3 text-white animated slideInRight">Blog-Page</h1>
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

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-post mt-4">
                <img src="<?php echo 'Mobizzengineering_Portal/pages/Blog/display_blog.php?id=' . $row['index']; ?>" style="max-height: 50vh; width: 100%;">
                    <h2 class="mb-2 mt-2"><?php echo $row['main_title']; ?></h2>
                    <p class="text-muted">Published on <span class="font-weight-bold"><?php echo $row['date']; ?></span></p>
                    <p><?php echo $row['sub_title']; ?></p>
                </div>
            </div>

            <!-- Sidebar Section -->
            <div class="col-lg-4 mt-4">
                <div class="sidebar">
                    <h3 class="mb-3">Popular Posts</h3>
                    <ul class="list-unstyled">
                    <?php    
                    foreach ($popularPosts as $post) {
                        echo '<li><a href="blog.php?id=' . $post['index'] . '">' . $post['main_title'] . '</a></li>';
                    }
                    ?>
                    </ul>

                    <div class="ftco-animate mt-2">
                        <h3 class="mb-3">Latest Post</h3>
                        <div class="blog-entry">
                            <div class="text bg-white p-4">
                                <a href="blog.html" class="block-20">
                                    <div class="meta-date text-center p-2">
                                        <span class="day">23</span>
                                        <span class="mos">January</span>
                                        <span class="yr">2019</span>
                                    </div>
                                </a>
                                <h3 class="heading"><a href="blog.html" style="color: rgb(30, 30, 85);"><?php echo $row['main_title']; ?></a></h3>
                                <p class="overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;"><?php echo $row['sub_title']; ?></p>
                                <div class="d-flex align-items-center mt-4">
                                    <p class="mb-0" style="margin-right: 25px;">
                                        <a href="blog.html" class="btn btn-primary">Read More <span class="bi bi-arrow-right"></span></a>
                                    </p>
                                    <p class="ml-2 mb-0">
                                        <a href="#" class="mr-2">Admin</a>
                                        <a href="#" class="meta-chat"><span class="bi bi-chat"></span> 3</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- Comment Section -->
    <div class="container comment-section">
        <h2 class="mb-4">Comments</h2>
        <div class="row">
            <div class="col-lg-12">
                <!-- Comment Form -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment:</label>
                        <textarea class="form-control"  id="comment" name="comment" rows="6" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>

                <!-- Display Previous Comments for the specific post -->
                <div class="mt-4">
                    <h3>Previous Comments</h3>
                    <?php foreach ($previousComments as $comment) : ?>
                        <div class="comment">
                            <p><strong><?php echo $comment['name']; ?>:</strong> <?php echo $comment['comment']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
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
                <h6 class="text-light">08:30 am - 05:00 pm</h6>
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