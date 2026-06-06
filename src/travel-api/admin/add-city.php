<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'traveltr_traveltripo9283';
$databaseUsername = 'traveltr_tripo9283';
$databasePassword = '_i2m~e%SN!VP';

// Set headers for CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');  // Set the content type as JSON

// Establish database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());  // Output connection error
}

// Get city and note from request
$city = isset($_REQUEST['city']) ? trim($_REQUEST['city']) : '';
$note = isset($_REQUEST['note']) ? trim($_REQUEST['note']) : '';

// Validate input
if (empty($city) || empty($note)) {
    echo json_encode([
        "success" => false,
        "message" => "City and note parameters are required."
    ]);
    exit;
}

// Use prepared statement to prevent SQL injection
$stmt = $con->prepare("INSERT INTO city_data (city, note) VALUES (?, ?)");
$stmt->bind_param("ss", $city, $note); // bind both city and note

// Execute the query and handle result
if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "City data inserted successfully!"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Error: " . $stmt->error
    ]);
}

// Close the statement and connection
$stmt->close();
mysqli_close($con);

?>
