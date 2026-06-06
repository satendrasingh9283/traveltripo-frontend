<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

$databaseHost = 'localhost';
$databaseName = 'traveltr_traveltripo9283';
$databaseUsername = 'traveltr_tripo9283';
$databasePassword = '_i2m~e%SN!VP';

// Set headers for CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');  // Set the content type as JSON


// Establish database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    // Return error response
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . mysqli_connect_error()]);
    exit;
}

// Check if the form data is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and get the form data
    
    
    
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $booking_date = mysqli_real_escape_string($con, $_POST['booking_date']);
    $no_of_person = mysqli_real_escape_string($con, $_POST['no_of_person']);
    $days = mysqli_real_escape_string($con, $_POST['days']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    
  



    // Prepare the SQL insert query (ID will auto-increment)
    // $query = "INSERT INTO property_listing (propery_type, city, name, address, number, email, room_type, property_for, landmark, price, days, include, car_parking, swiming_pool, indoor_gym, date, discription, policy)
    
    //           VALUES ('$propery_type', '$city', '$name', '$address', '$number', '$email', '$room_type', '$property_for', '$property_for', '$landmark', '$price', '$days', '$include', '$car_parking', '$swiming_pool', '$indoor_gym', '$date', '$discription', '$policy')";
              
              $query = "INSERT INTO package_booking  (name, email, booking_date, no_of_person, days, amount, status)
                                         VALUES ('$name', '$email' , '$booking_date', '$no_of_person', '$days' , '$amount' , '$status')";


    // Execute the query
    if (mysqli_query($con, $query)) {
        // Success: Data inserted
        echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully.']);
    } else {
        // Error: Query failed
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . mysqli_error($con)]);
    }

} else {
    // Invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

// Close the database connection
mysqli_close($con);

?>
