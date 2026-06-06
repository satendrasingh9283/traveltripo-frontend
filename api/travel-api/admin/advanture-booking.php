<?php

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database credentials
$databaseHost = 'localhost';
$databaseName = 'bsidrill_traveltripo_portal';
$databaseUsername = 'bsidrill_tripo';
$databasePassword = '9412@123abcABC';

// CORS headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit; 
}

// Connect to DB
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . mysqli_connect_error()]);
    exit;
}

// POST only
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Validate required fields
    $required_fields = ['name', 'email', 'booking_date', 'no_of_person', 'days', 'amount', 'status'];
    
    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || $_POST[$field] === '') {
            echo json_encode(['status' => 'error', 'message' => "$field is required"]);
            exit;
        }
    }

    // Escape input
    $name         = mysqli_real_escape_string($con, $_POST['name']);
    $email        = mysqli_real_escape_string($con, $_POST['email']);
    $booking_date = mysqli_real_escape_string($con, $_POST['booking_date']);
    $no_of_person = mysqli_real_escape_string($con, $_POST['no_of_person']);
    $days         = mysqli_real_escape_string($con, $_POST['days']);
    $amount       = mysqli_real_escape_string($con, $_POST['amount']);
    $status       = mysqli_real_escape_string($con, $_POST['status']);

    // Insert query
    $query = "INSERT INTO advanture_booking 
                (name, email, booking_date, no_of_person, days, amount, status)
              VALUES 
                ('$name', '$email', '$booking_date', '$no_of_person', '$days', '$amount', '$status')";

    // Execute query
    if (mysqli_query($con, $query)) {
        echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'DB Error: ' . mysqli_error($con)]);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Close DB connection
mysqli_close($con);
?>
