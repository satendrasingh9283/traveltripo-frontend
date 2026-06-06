<?php

// ===============================
// Error reporting (disable on live)
// ===============================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ===============================
// Database configuration
// ===============================
$databaseHost = 'localhost';
$databaseName = 'traveltr_traveltripo9283';
$databaseUsername = 'traveltr_tripo9283';
$databasePassword = '_i2m~e%SN!VP';

// ===============================
// Headers
// ===============================
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json");

// ===============================
// Database connection
// ===============================
$con = mysqli_connect(
    $databaseHost,
    $databaseUsername,
    $databasePassword,
    $databaseName
);

if (!$con) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Database connection failed"
    ]);
    exit;
}

// ===============================
// Get city from query string
// ===============================
$city = isset($_GET['city']) ? trim($_GET['city']) : '';

if ($city === '') {
    http_response_code(400);
    echo json_encode([
        "status" => "error",
        "message" => "City parameter is required"
    ]);
    exit;
}

// ===============================
// SQL Query (CHANGE COLUMN NAME HERE IF NEEDED)
// ===============================
$query = "SELECT * FROM hotel_list WHERE city = ?";  
// 👆 If your column is hotel_city or location, change it here

$stmt = mysqli_prepare($con, $query);

if (!$stmt) {
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => mysqli_error($con)
    ]);
    exit;
}

mysqli_stmt_bind_param($stmt, "s", $city);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// ===============================
// Response
// ===============================
$hotels = [];

if ($result && mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        $hotels[] = $row;
    }

    echo json_encode([
        "status" => "success",
        "city" => $city,
        "total_hotels" => count($hotels),
        "data" => $hotels
    ]);

} else {

    echo json_encode([
        "status" => "success",
        "city" => $city,
        "total_hotels" => 0,
        "message" => "No hotels found",
        "data" => []
    ]);
}

// ===============================
// Close connection
// ===============================
mysqli_close($con);
?>
