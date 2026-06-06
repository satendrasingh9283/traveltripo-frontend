<?php

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'traveltr_traveltripo9283';
$databaseUsername = 'traveltr_tripo9283';
$databasePassword = '_i2m~e%SN!VP';

// Set headers for CORS and JSON
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');

// Connect to the database
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    echo json_encode(array("error" => "Connection failed: " . mysqli_connect_error()));
    exit;
}

// Check if 'id' parameter exists
if (!isset($_GET['id'])) {
    echo json_encode(array("error" => "No ID parameter provided."));
    exit;
}

$id = intval($_GET['id']); // sanitize

// Prepare SQL statement
$stmt = $con->prepare("
    SELECT 
        id,
        city,
        title,
        days,
        price,
        hotel_type,
        number,
        address,
        images,
        food,
        transport,
        sightseeing,
        video,
        policy,
        description
    FROM package_list
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

// Bind result variables
$stmt->bind_result(
    $id,
    $city,
    $title,
    $days,
    $price,
    $hotel_type,
    $number,
    $address,
    $images,
    $food,
    $transport,
    $sightseeing,
    $video,
    $policy,
    $description
);

// Fetch result
if ($stmt->fetch()) {
    $data = array(
        "id" => $id,
        "city" => $city,
        "title" => $title,
        "days" => $days,
        "price" => $price,
        "hotel_type" => $hotel_type,
        "number" => $number,
        "address" => $address,
        "images" => $images,
        "food" => $food,
        "transport" => $transport,
        "sightseeing" => $sightseeing,
        "video" => $video,
        "policy" => $policy,
        "description" => $description
    );
    echo json_encode(["data" => $data]);
} else {
    echo json_encode(["message" => "No property found with that ID."]);
}

$stmt->close();
$con->close();

?>
