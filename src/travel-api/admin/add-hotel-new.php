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
    echo json_encode(['status' => 'error', 'message' => 'DB connection failed']);
    exit;
}

// ---------------- METHOD CHECK ----------------
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
    exit;
}

// ---------------- FORM DATA ----------------
$propery_type       = mysqli_real_escape_string($con, $_POST['propery_type'] ?? '');
$city               = mysqli_real_escape_string($con, $_POST['city'] ?? '');
$name               = mysqli_real_escape_string($con, $_POST['name'] ?? '');
$address            = mysqli_real_escape_string($con, $_POST['address'] ?? '');
$number             = mysqli_real_escape_string($con, $_POST['number'] ?? '');
$email              = mysqli_real_escape_string($con, $_POST['email'] ?? '');
$room_type          = mysqli_real_escape_string($con, $_POST['room_type'] ?? '');
$property_for       = mysqli_real_escape_string($con, $_POST['property_for'] ?? '');
$landmark           = mysqli_real_escape_string($con, $_POST['landmark'] ?? '');
$price              = mysqli_real_escape_string($con, $_POST['price'] ?? '');
$days               = mysqli_real_escape_string($con, $_POST['days'] ?? '');
$include            = mysqli_real_escape_string($con, $_POST['include'] ?? '');
$car_parking        = mysqli_real_escape_string($con, $_POST['car_parking'] ?? '');
$swiming_pool       = mysqli_real_escape_string($con, $_POST['swiming_pool'] ?? '');
$indoor_gym         = mysqli_real_escape_string($con, $_POST['indoor_gym'] ?? '');
$date               = mysqli_real_escape_string($con, $_POST['date'] ?? '');
$discription        = mysqli_real_escape_string($con, $_POST['discription'] ?? '');
$map                = mysqli_real_escape_string($con, $_POST['map'] ?? '');
$policy             = mysqli_real_escape_string($con, $_POST['policy'] ?? '');
$status             = mysqli_real_escape_string($con, $_POST['status'] ?? '');

// ---------------- CHECKBOXES ----------------
$air_condition      = isset($_POST['air_condition']) ? mysqli_real_escape_string($con, $_POST['air_condition']) : 'no';
$fridge             = isset($_POST['fridge']) ? mysqli_real_escape_string($con, $_POST['fridge']) : 'no';
$attached_washroom  = isset($_POST['attached_washroom']) ? mysqli_real_escape_string($con, $_POST['attached_washroom']) : 'no';
$microwave          = isset($_POST['microwave']) ? mysqli_real_escape_string($con, $_POST['microwave']) : 'no';

// ---------------- IMAGE UPLOAD ----------------
$uploadDir = "uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true); // create folder if it doesn't exist
}

$imageArray = [];
if (!empty($_FILES['images']['name'][0])) {
    for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
        if ($_FILES['images']['error'][$i] === 0) {
            $tmpName = $_FILES['images']['tmp_name'][$i];
            $ext = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
            $newName = uniqid('hotel_', true) . '.' . $ext;
            $uploadPath = $uploadDir . $newName;

            if (move_uploaded_file($tmpName, $uploadPath)) {
                $imageArray[] = $uploadPath;
            }
        }
    }
}

// Save images as JSON array
$imageJson = json_encode($imageArray, JSON_UNESCAPED_SLASHES);

// ---------------- SQL INSERT ----------------
$query = "INSERT INTO hotel_list (
    propery_type, city, name, address, number, email, images, room_type, property_for,
    landmark, price, days, include, car_parking, swiming_pool, indoor_gym, date,
    air_condition, fridge, attached_washroom, microwave, discription, map, policy, status
) VALUES (
    '$propery_type', '$city', '$name', '$address', '$number', '$email', '$imageJson',
    '$room_type', '$property_for', '$landmark', '$price', '$days', '$include',
    '$car_parking', '$swiming_pool', '$indoor_gym', '$date',
    '$air_condition', '$fridge', '$attached_washroom', '$microwave',
    '$discription', '$map', '$policy', '$status'
)";

// ---------------- EXECUTE ----------------
if (mysqli_query($con, $query)) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Data inserted successfully.',
        'images' => $imageArray // return uploaded images
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'SQL Error: ' . mysqli_error($con)
    ]);
}

// ---------------- CLOSE CONNECTION ----------------
mysqli_close($con);
?>
