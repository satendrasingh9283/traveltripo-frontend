

<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
 $databaseHost = 'localhost';
$databaseName = 'creativemindx';
$databaseUsername ='creativemindx-9283';
$databasePassword ='CLYCtCyno.ht';

// Set headers for CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

// Establish database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());  // Output connection error
}

// Get city from request
$city = isset($_REQUEST['city']) ? $_REQUEST['city'] : '';

// Validate if city is not empty
if (empty($city)) {
    echo "City parameter is missing or empty!";
    exit;
}

// Use prepared statement to prevent SQL injection
$stmt = $con->prepare("INSERT INTO city_data (city) VALUES (?)");
$stmt->bind_param("s", $city);

// Execute the query and handle result
if ($stmt->execute()) {
    echo "City data inserted successfully!";
} else {
    echo "Error: " . $stmt->error;  // Show detailed error if insertion fails
}

// Close the statement
$stmt->close();

// Close the connection
mysqli_close($con);

?>
