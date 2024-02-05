<?php
// Connect to your database (update the credentials)
$mysqli = new mysqli('localhost', 'root', '','mobizz_eng');

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Retrieve project data from the database
$query = "SELECT * FROM project";
$result = $mysqli->query($query);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    echo "<h2>Project Data</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Title</th><th>Image</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['title'] . "</td>";
        // Assuming 'image' is the column with the image file name or identifier
        $imagePath = 'Mobizzengineering_Portal/pages/Home/uploads/' . $row['image'];
        echo "<td><img src='$imagePath' class='card-img-top' alt='...' style='max-height: 30vh; width: 100%; object-fit: cover;'></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No records found.";
}

// Close the database connection
$mysqli->close();
?>
