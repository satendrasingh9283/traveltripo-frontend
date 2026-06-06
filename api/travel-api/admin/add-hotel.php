<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database configuration
$databaseHost = 'localhost';
$databaseName = 'bsidrill_traveltripo_portal';
$databaseUsername = 'bsidrill_tripo';
$databasePassword = '9412@123abcABC';

// Set headers for CORS and JSON response
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');

// Establish database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . mysqli_connect_error()]);
    exit;
}

// Check if the form data is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and get form data
    $propery_type = mysqli_real_escape_string($con, $_POST['propery_type']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $room_type = mysqli_real_escape_string($con, $_POST['room_type']);
    $property_for = mysqli_real_escape_string($con, $_POST['property_for']);
    $landmark = mysqli_real_escape_string($con, $_POST['landmark']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $days = mysqli_real_escape_string($con, $_POST['days']);
    $include = mysqli_real_escape_string($con, $_POST['include']);
    $car_parking = mysqli_real_escape_string($con, $_POST['car_parking']);
    $swiming_pool = mysqli_real_escape_string($con, $_POST['swiming_pool']);
    $indoor_gym = mysqli_real_escape_string($con, $_POST['indoor_gym']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $discription = mysqli_real_escape_string($con, $_POST['discription']);
    $map = mysqli_real_escape_string($con, $_POST['map']);
    $policy = mysqli_real_escape_string($con, $_POST['policy']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    // Handle checkbox inputs safely (default to 'no')
    $air_condition = isset($_POST['air_condition']) ? mysqli_real_escape_string($con, $_POST['air_condition']) : 'no';
    $fridge = isset($_POST['fridge']) ? mysqli_real_escape_string($con, $_POST['fridge']) : 'no';
    $attached_washroom = isset($_POST['attached_washroom']) ? mysqli_real_escape_string($con, $_POST['attached_washroom']) : 'no';
    $microwave = isset($_POST['microwave']) ? mysqli_real_escape_string($con, $_POST['microwave']) : 'no';

    // Handle multiple file uploads
    $imagePaths = [];

    if (isset($_FILES['images']) && $_FILES['images']['error'][0] == 0) {
        for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
            $imageTmpPath = $_FILES['images']['tmp_name'][$i];
            $imageName = time() . '_' . basename($_FILES['images']['name'][$i]);
            $uploadDir = "uploads/";
            $imagePath = $uploadDir . $imageName;

            // Create uploads directory if not exists
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            // Move uploaded file
            if (move_uploaded_file($imageTmpPath, $imagePath)) {
                $imagePaths[] = $imagePath;
            }
        }
    }

    // Convert image array to a comma-separated string
    $imagePathsString = implode(',', $imagePaths);

    // Prepare SQL insert query
    $query = "INSERT INTO hotel_list (
        propery_type, city, name, address, number, email, images, room_type, property_for,
        landmark, price, days, include, car_parking, swiming_pool, indoor_gym, date,
        air_condition, fridge, attached_washroom, microwave, discription, map, policy, status
    ) VALUES (
        '$propery_type', '$city', '$name', '$address', '$number', '$email', '$imagePathsString',
        '$room_type', '$property_for', '$landmark', '$price', '$days', '$include',
        '$car_parking', '$swiming_pool', '$indoor_gym', '$date',
        '$air_condition', '$fridge', '$attached_washroom', '$microwave',
        '$discription', '$map', '$policy', '$status'
    )";

    // Execute the query
    if (mysqli_query($con, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'SQL Error: ' . mysqli_error($con)]);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

// Close the database connection
mysqli_close($con);
?>
