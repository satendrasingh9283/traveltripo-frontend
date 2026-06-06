<?php

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'traveltr_traveltripo9283';
$databaseUsername = 'traveltr_tripo9283';
$databasePassword = '_i2m~e%SN!VP';

// CORS Headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json");

// Database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    die(json_encode([
        "success" => false,
        "message" => "Database connection failed: " . mysqli_connect_error()
    ]));
}

// Get city value
$city = isset($_REQUEST['city']) ? trim($_REQUEST['city']) : '';

// Validate city
if (empty($city)) {
    echo json_encode([
        "success" => false,
        "message" => "City is required"
    ]);
    exit;
}

// Default status
$status = "active";

// Generate unique city ID
$id = "city_" . rand(10000, 99999);

// Insert query
$stmt = $con->prepare("INSERT INTO city_data (id, city, status) VALUES (?, ?, ?)");

// Check prepare
if (!$stmt) {
    echo json_encode([
        "success" => false,
        "message" => "Prepare failed: " . $con->error
    ]);
    exit;
}

// Bind values
$stmt->bind_param("sss", $id, $city, $status);

// Execute query
if ($stmt->execute()) {

    echo json_encode([
        "success" => true,
        "message" => "City inserted successfully",
        "data" => [
            "id" => $id,
            "city" => $city,
            "status" => $status
        ]
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => "Insert failed: " . $stmt->error
    ]);

}

// Close connection
$stmt->close();
mysqli_close($con);

?>