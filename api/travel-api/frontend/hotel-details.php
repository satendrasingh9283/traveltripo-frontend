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
    echo json_encode(array("error" => "Connection failed: " . mysqli_connect_error()));
    exit;
}

// Check if 'id' parameter is provided
if (!isset($_GET['id'])) {
    echo json_encode(array("error" => "No ID parameter provided."));
    exit;
}

$id = $_GET['id'];

// Prepare the SQL statement
$stmt = $con->prepare("
    SELECT 
        id,
        propery_type,
        city,
        name,
        address,
        number,
        email,
        images,
        room_type,
        property_for,
        landmark,
        price,
        days,
        `include`,
        car_parking,
        swiming_pool,
        indoor_gym,
        date,
        air_condition,
        fridge,
        attached_washroom,
        microwave,
        discription,
        map,
        policy
    FROM hotel_list
    WHERE id = ?
");

$stmt->bind_param("i", $id);

// Execute the query
if (!$stmt->execute()) {
    echo json_encode(array("error" => "Query execution failed: " . $stmt->error));
    $stmt->close();
    $con->close();
    exit;
}

// Bind result variables
$stmt->bind_result(
    $id,
    $propery_type,
    $city,
    $name,
    $address,
    $number,
    $email,
    $images,
    $room_type,
    $property_for,
    $landmark,
    $price,
    $days,
    $include,
    $car_parking,
    $swiming_pool,
    $indoor_gym,
    $date,
    $air_condition,
    $fridge,
    $attached_washroom,
    $microwave,
    $discription,
    $map,
    $policy
);

// Fetch the result
if ($stmt->fetch()) {
    $data = array(
        "id" => $id,
        "propery_type" => $propery_type,
        "city" => $city,
        "name" => $name,
        "address" => $address,
        "number" => $number,
        "email" => $email,
        "images" => $images,
        "room_type" => $room_type,
        "property_for" => $property_for,
        "landmark" => $landmark,
        "price" => $price,
        "days" => $days,
        "include" => $include,
        "car_parking" => $car_parking,
        "swiming_pool" => $swiming_pool,
        "indoor_gym" => $indoor_gym,
        "date" => $date,
        "air_condition" => $air_condition,
        "fridge" => $fridge,
        "attached_washroom" => $attached_washroom,
        "microwave" => $microwave,
        "discription" => $discription,
        "map" => $map,
        "policy" => $policy
    );
    echo json_encode(array("data" => $data));
} else {
    echo json_encode(array("message" => "No property found with that ID."));
}

$stmt->close();
$con->close();

?>
