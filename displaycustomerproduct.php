<?php
Include"dbconn.php";

// Fetch data from the database
$sql = "SELECT id, feature_title, description, status FROM customizefeature WHERE status = 'active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="rows">';
        echo '<h6><ul><li>' . $row["feature_title"] . '</li></ul></h6>';
        echo '<p>' . $row["description"] . '</p>';
        echo '</div>';
    }
} else {
    echo "No features found in the database.";
}

$conn->close();
?>
