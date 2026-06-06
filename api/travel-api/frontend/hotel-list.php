<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'bsidrill_traveltripo_portal';
$databaseUsername = 'bsidrill_tripo';
$databasePassword = '9412@123abcABC';

// Set headers for CORS and content type
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');

// Establish database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Database connection failed",
        "error" => mysqli_connect_error()
    ]);
    exit;
}

// Query to fetch all hotels
$query = "SELECT * FROM hotel_list";
$result = mysqli_query($con, $query);

// Prepare response
if ($result && mysqli_num_rows($result) > 0) {
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    http_response_code(200);
    echo json_encode([
        "status" => "success",
        "message" => "Hotels retrieved successfully",
        "data" => $data
    ]);
} else {
    http_response_code(200); // No error, just empty data
    echo json_encode([
        "status" => "success",
        "message" => "No hotels found",
        "data" => []
    ]);
}

// Close connection
mysqli_close($con);
?>
