<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'creativemindx';
$databaseUsername = 'creativemindx-9283';
$databasePassword = 'CLYCtCyno.ht';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Establish database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());  // Output connection error
}

// Define the API response array
$response = array();

// Check if the request method is GET (You could change it if you want to allow other methods)
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Query to get user data (adjust to your table and column names)
    $query = "SELECT id, name, email, mobile FROM enquiry";  // assuming users is your table
    $result = mysqli_query($con, $query);

    // Check if query was successful
    if ($result) {
        // Fetch data as associative array
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        // Set the response data
        $response['status'] = 'success';
        $response['data'] = $data;
    } else {
        // If no data found or query failed
        $response['status'] = 'error';
        $response['message'] = 'No records found or query failed';
    }
    
} else {
    // If method is not GET, return error
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method';
}

// Set Content-Type header to JSON for API response
header('Content-Type: application/json');

// Output the response in JSON format
echo json_encode($response);

// Close the database connection
mysqli_close($con);
?>
