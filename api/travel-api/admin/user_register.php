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
header('Content-Type: application/json');

// Establish database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    die(json_encode([
        "success" => false,
        "message" => "Database connection failed: " . mysqli_connect_error()
    ]));
}

// Get fields from request
$name = isset($_REQUEST['name']) ? trim($_REQUEST['name']) : '';
$email = isset($_REQUEST['email']) ? trim($_REQUEST['email']) : '';
$number = isset($_REQUEST['number']) ? trim($_REQUEST['number']) : '';
$address = isset($_REQUEST['address']) ? trim($_REQUEST['address']) : '';

// Validate required fields
if (empty($name) || empty($email)) {
    echo json_encode([
        "success" => false,
        "message" => "Name and Email are required."
    ]);
    exit;
}

// Prepared statement (fixed SQL syntax)
$stmt = $con->prepare("INSERT INTO user_register (name, email, number, address) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $number, $address);

// Execute query
if ($stmt->execute()) {
    echo json_encode([
        "success" => true,
        "message" => "User registered successfully!"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Error inserting data: " . $stmt->error
    ]);
}

// Close resources
$stmt->close();
mysqli_close($con);

?>
