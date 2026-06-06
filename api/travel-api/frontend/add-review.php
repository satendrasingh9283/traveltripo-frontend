<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'bsidrill_traveltripo_portal';
$databaseUsername = 'bsidrill_tripo';
$databasePassword = '9412@123abcABC';

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

// Get form input
$name = isset($_REQUEST['name']) ? trim($_REQUEST['name']) : '';
$email = isset($_REQUEST['email']) ? trim($_REQUEST['email']) : '';
$rating = isset($_REQUEST['rating']) ? trim($_REQUEST['rating']) : '';
$date = isset($_REQUEST['date']) && !empty(trim($_REQUEST['date'])) 
    ? trim($_REQUEST['date']) 
    : date('Y-m-d'); // Default to today's date if not provided
$comment = isset($_REQUEST['comment']) ? trim($_REQUEST['comment']) : '';

// Validate input
if (empty($name) || empty($email) || empty($rating) || empty($comment)) {
    echo json_encode([
        "success" => false,
        "message" => "Name, Email, Rating and Comment parameters are required."
    ]);
    exit;
}

// Use prepared statement to prevent SQL injection
$stmt = $con->prepare("INSERT INTO review_list (name, email, rating, date, comment) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $rating, $date, $comment);

// Execute the query and handle result
if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "Review inserted successfully!"
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
