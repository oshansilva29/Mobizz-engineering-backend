<!DOCTYPE html>
<html lang="en">
<head>
<?php
Include"dbconn.php";
$sql = "SELECT title,img_path FROM bannerhead";
$result = $conn->query($sql);

// Check if the query execution was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}
?>


    <!-- Your head content remains the same -->
</head>

<body>
    <!-- Your existing HTML content -->

    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <?php
                $isActive = true;

                while ($row = $result->fetch_assoc()) {
                    echo '<div class="carousel-item' . ($isActive ? ' active' : '') . '">';
                    echo '<img class="w-100" src="' . $row['img_path'] . '" style="width: 200px; height: 500px; border: 2px solid #000;" alt="Image">';
                    echo '<div class="carousel-caption">';
                    echo '<div class="container">';
                    echo '<div class="row justify-content-center">';
                    echo '<div class="col-lg-10 text-start">';
                    echo '<h1 class="display-1 text-white mb-5 animated slideInRight">' . $row['title'] . '</h1>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    $isActive = false;
                }
                ?>

            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Your remaining HTML content -->

    <?php
    $conn->close();
    ?>

    <!-- Remaining part of your HTML -->
</body>

</html>
