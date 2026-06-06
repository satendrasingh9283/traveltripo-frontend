<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'traveltr_traveltripo9283';
$databaseUsername = 'traveltr_tripo9283';
$databasePassword = '_i2m~e%SN!VP';

// Set headers for CORS and JSON
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');

// Connect to the database
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$con) {
    die(json_encode([
        "success" => false,
        "message" => "Connection failed: " . mysqli_connect_error()
    ]));
}

// Get the 'id' from GET or POST
$id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;

if ($id <= 0) {
    echo json_encode([
        "success" => false,
        "message" => "Valid 'id' parameter is required."
    ]);
    exit;
}

// Prepare statement to fetch city and note for the given id
$stmt = $con->prepare("SELECT city, note FROM city_data WHERE id = ?");
if (!$stmt) {
    echo json_encode([
        "success" => false,
        "message" => "Prepare failed: " . $con->error
    ]);
    exit;
}

$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    // Bind result variables
    $stmt->bind_result($city, $note);

    // Fetch the data
    if ($stmt->fetch()) {
        echo json_encode([
            "success" => true,
            "data" => [
                "city" => $city,
                "note" => $note
            ]
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "No record found for the given ID."
        ]);
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => "Query execution error: " . $stmt->error
    ]);
}

$stmt->close();
mysqli_close($con);

?>
