<?php
Include"dbconn.php";
// Fetch data from the database
$sql = "SELECT id, feature_title, feature_description FROM network_implement_feature WHERE status = 'active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="rows">';
        echo '<h6><ul><li>' . $row["feature_title"] . '</li></ul></h6>';
        echo '<p>' . $row["feature_description"] . '</p>';
        echo '</div>';
    }
} else {
    echo "No features found in the database.";
}

$conn->close();
?>
