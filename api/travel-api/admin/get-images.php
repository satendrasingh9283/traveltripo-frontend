<?php
// Database connection
$databaseHost = 'localhost';
$databaseName = 'creativemindx';
$databaseUsername ='creativemindx-9283';
$databasePassword ='CLYCtCyno.ht';

// Set headers for CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');  // Set the content type as JSON

/ Create a connection to the MySQL database
$con = new mysqli($host, $username, $password, $dbname);

// Check if the connection was successful
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// SQL query to fetch image paths from the database
$sql = "SELECT image_path FROM images";  // Assume your table is named 'images' and it has a column 'image_path'
$result = $con->query($sql);

// Initialize an empty array to store the image paths
$imagePaths = array();

// Check if there are any results
if ($result->num_rows > 0) {
    // Fetch each row and add the image path to the array
    while($row = $result->fetch_assoc()) {
        $imagePaths[] = $row['image_path']; // Assuming the column name is 'image_path'
    }
} else {
    echo "No images found.";
}

// Close the database connection
$con->close();

// Output the array for demonstration
echo '<pre>';
print_r($imagePaths);
echo '</pre>';
?>