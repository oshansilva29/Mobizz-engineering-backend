<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database configuration
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'mobizz_eng';

    // Retrieve form data
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    // Create a database connection
    $conn = new mysqli($host, $user, $password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize input to prevent SQL injection
    $name = $conn->real_escape_string($name);
    $comment = $conn->real_escape_string($comment);

    // Insert data into the database
    $query = "INSERT INTO comments (name, comment) VALUES ('$name', '$comment')";
    $result = $conn->query($query);

    // Check if the query was successful
    if ($result) {
        echo "Comment submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect to the form if accessed directly without submitting
    header("Location: index.html");
    exit();
}
?>
