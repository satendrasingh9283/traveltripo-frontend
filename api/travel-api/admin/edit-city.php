<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// DB config
$databaseHost = 'localhost';
$databaseName = 'bsidrill_traveltripo_portal';
$databaseUsername = 'bsidrill_tripo';
$databasePassword = '9412@123abcABC';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');

// DB connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$con) {
    echo json_encode([
        "success" => false,
        "message" => "Connection failed: " . mysqli_connect_error()
    ]);
    exit;
}

// Get parameters
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$city = isset($_GET['city']) ? trim($_GET['city']) : '';
$note = isset($_GET['note']) ? trim($_GET['note']) : '';

// Validate
if ($id <= 0 || empty($city) || empty($note)) {
    echo json_encode([
        "success" => false,
        "message" => "ID, city, and note are required."
    ]);
    exit;
}

// Prepare query
$stmt = $con->prepare("UPDATE city_data SET city = ?, note = ? WHERE id = ?");
if (!$stmt) {
    echo json_encode([
        "success" => false,
        "message" => "Prepare failed: " . $con->error
    ]);
    exit;
}

$stmt->bind_param("ssi", $city, $note, $id);

// Execute
if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode([
            "success" => true,
            "message" => "City updated successfully."
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "message" => "No changes made. ID might not exist or data is same."
        ]);
    }
} else {
    echo json_encode([
        "success" => false,
        "message" => "Execution error: " . $stmt->error
    ]);
}

$stmt->close();
mysqli_close($con);

?>
