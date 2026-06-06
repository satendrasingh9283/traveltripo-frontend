<?php

// ---------------- ERROR REPORTING ----------------
ini_set('display_errors', 1);
error_reporting(E_ALL);

// ---------------- DATABASE CONFIG ----------------
$databaseHost = 'localhost';
$databaseName = 'traveltr_traveltripo9283';
$databaseUsername = 'traveltr_tripo9283';
$databasePassword = '_i2m~e%SN!VP';

// ---------------- HEADERS ----------------
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json");

// ---------------- DB CONNECTION ----------------
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$con) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

// ---------------- METHOD CHECK ----------------
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

// ---------------- FORM DATA ----------------
$city         = mysqli_real_escape_string($con, $_POST['city'] ?? '');
$title        = mysqli_real_escape_string($con, $_POST['title'] ?? '');
$days         = mysqli_real_escape_string($con, $_POST['days'] ?? '');
$price        = mysqli_real_escape_string($con, $_POST['price'] ?? '');
$hotel_type   = mysqli_real_escape_string($con, $_POST['hotel_type'] ?? '');
$number       = mysqli_real_escape_string($con, $_POST['number'] ?? '');
$address      = mysqli_real_escape_string($con, $_POST['address'] ?? '');
$food         = mysqli_real_escape_string($con, $_POST['food'] ?? '');
$transport    = mysqli_real_escape_string($con, $_POST['transport'] ?? '');
$sightseeing  = mysqli_real_escape_string($con, $_POST['sightseeing'] ?? '');
$video        = mysqli_real_escape_string($con, $_POST['video'] ?? '');
$policy       = mysqli_real_escape_string($con, $_POST['policy'] ?? '');
$description  = mysqli_real_escape_string($con, $_POST['description'] ?? '');
$status       = mysqli_real_escape_string($con, $_POST['status'] ?? '');

// ---------------- IMAGE UPLOAD ----------------
$uploadDir = "uploads/";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

$imageArray = [];

if (!empty($_FILES['images']['name'][0])) {

    for ($i = 0; $i < count($_FILES['images']['name']); $i++) {

        if ($_FILES['images']['error'][$i] === 0) {

            $tmpName = $_FILES['images']['tmp_name'][$i];
            $ext = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);

            $newName = uniqid('pkg_', true) . '.' . $ext;
            $uploadPath = $uploadDir . $newName;

            if (move_uploaded_file($tmpName, $uploadPath)) {
                $imageArray[] = $uploadPath; // STORE IN ARRAY
            }
        }
    }
}

// Convert image array to JSON
$imageJson = json_encode($imageArray, JSON_UNESCAPED_SLASHES);

// ---------------- INSERT QUERY ----------------
$query = "INSERT INTO package_list 
(city, title, days, price, hotel_type, number, address, images, food, transport, sightseeing, video, policy, description, status)
VALUES
('$city', '$title', '$days', '$price', '$hotel_type', '$number', '$address', '$imageJson', '$food', '$transport', '$sightseeing', '$video', '$policy', '$description', '$status')";

if (mysqli_query($con, $query)) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Package added successfully',
        'images' => $imageArray
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => mysqli_error($con)
    ]);
}

mysqli_close($con);
?>
