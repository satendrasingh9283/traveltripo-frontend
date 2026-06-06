<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$databaseHost = 'localhost';
$databaseName = 'traveltr_traveltripo9283';
$databaseUsername = 'traveltr_tripo9283';
$databasePassword = '_i2m~e%SN!VP';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$con) {
    echo json_encode(['status' => 'error', 'message' => 'DB connection failed']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
    exit;
}

/* ---------------- FORM DATA ---------------- */
$city           = mysqli_real_escape_string($con, $_POST['city'] ?? '');
$advanture_name = mysqli_real_escape_string($con, $_POST['advanture_name'] ?? '');
$price          = mysqli_real_escape_string($con, $_POST['price'] ?? '');
$advanture_type = mysqli_real_escape_string($con, $_POST['advanture_type'] ?? '');
$transport      = mysqli_real_escape_string($con, $_POST['transport'] ?? '');
$number         = mysqli_real_escape_string($con, $_POST['number'] ?? '');
$address        = mysqli_real_escape_string($con, $_POST['address'] ?? '');
$video          = mysqli_real_escape_string($con, $_POST['video'] ?? '');
$description    = mysqli_real_escape_string($con, $_POST['description'] ?? '');
$privacy        = mysqli_real_escape_string($con, $_POST['privacy'] ?? '');
$date           = mysqli_real_escape_string($con, $_POST['date'] ?? '');
$status         = mysqli_real_escape_string($con, $_POST['status'] ?? '');

/* ---------------- IMAGE UPLOAD ---------------- */
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

            $newName = uniqid() . '.' . $ext;
            $uploadPath = $uploadDir . $newName;

            if (move_uploaded_file($tmpName, $uploadPath)) {
                $imageArray[] = $uploadPath;   // ARRAY PUSH
            }
        }
    }
}

/* ---------------- CONVERT ARRAY TO JSON ---------------- */
$imageJson = json_encode($imageArray, JSON_UNESCAPED_SLASHES);

/* ---------------- INSERT DATA ---------------- */
$query = "INSERT INTO advanture_list
(city, advanture_name, price, advanture_type, transport, images, number, address, video, description, privacy, date, status)
VALUES
('$city', '$advanture_name', '$price', '$advanture_type', '$transport', '$imageJson', '$number', '$address', '$video', '$description', '$privacy', '$date', '$status')";

if (mysqli_query($con, $query)) {
    echo json_encode([
        'status' => 'success',
        'images' => $imageArray   // RETURN ARRAY IN RESPONSE
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => mysqli_error($con)
    ]);
}

mysqli_close($con);
?>
