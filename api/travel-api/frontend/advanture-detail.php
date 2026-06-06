<?php

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'bsidrill_traveltripo_portal';
$databaseUsername = 'bsidrill_tripo';
$databasePassword = '9412@123abcABC';

// Set headers for CORS and JSON
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');

// Connect to the database
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    echo json_encode(["error" => "Connection failed: " . mysqli_connect_error()]);
    exit;
}

// Check if 'id' parameter exists
if (!isset($_GET['id'])) {
    echo json_encode(["error" => "No ID parameter provided."]);
    exit;
}

$id = intval($_GET['id']); // sanitize

// Prepare SQL statement (FIXED)
$stmt = $con->prepare("
    SELECT 
        id,
        city,
        advanture_name,
        price,
        advanture_type,
        transport,
        images,
        number,
        address,
        video,
        description,
        privacy,
        date
    FROM advanture_list
    WHERE id = ?
");

if (!$stmt) {
    echo json_encode(["error" => "Prepare failed: " . $con->error]);
    exit;
}

$stmt->bind_param("i", $id);

// Execute the query
if (!$stmt->execute()) {
    echo json_encode(["error" => "Query execution failed: " . $stmt->error]);
    $stmt->close();
    $con->close();
    exit;
}

// Bind result variables (FIXED count)
$stmt->bind_result(
    $id,
    $city,
    $advanture_name,
    $price,
    $advanture_type,
    $transport,
    $images,
    $number,
    $address,
    $video,
    $description,
    $privacy,
    $date
);

// Fetch result
if ($stmt->fetch()) {
    $data = [
        "id" => $id,
        "city" => $city,
        "advanture_name" => $advanture_name,
        "price" => $price,
        "advanture_type" => $advanture_type,
        "transport" => $transport,
        "images" => $images,
        "number" => $number,
        "address" => $address,
        "video" => $video,
        "description" => $description,
        "privacy" => $privacy,
        "date" => $date
    ];
    echo json_encode(["data" => $data]);
} else {
    echo json_encode(["message" => "No property found with that ID."]);
}

$stmt->close();
$con->close();

?>
