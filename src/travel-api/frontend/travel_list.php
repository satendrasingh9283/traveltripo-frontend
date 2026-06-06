<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
 $databaseHost = 'localhost';
$databaseName = 'traveltr_traveltripo9283';
$databaseUsername ='traveltr_tripo9283';
$databasePassword ='_i2m~e%SN!VP';


// Set headers for CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');  // Set the content type as JSON

// Establish database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    die(json_encode(array("error" => "Connection failed: " . mysqli_connect_error())));  // Return error message as JSON
}

// Query to fetch all cities from the city_data table
$query = "SELECT * FROM travel_offers";

// Execute the query
$result = mysqli_query($con, $query);

// Check if there are results
$data = array();  // Initialize an array to store data

if (mysqli_num_rows($result) > 0) {
    // Loop through results and store them in the $data array
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;  // Append each row to the $data array
    }
    // Return data in a 'data' object
    echo json_encode(array("data" => $data));
} else {
    // Return an empty array if no data found
    echo json_encode(array("data" => []));
}

// Close the connection
mysqli_close($con);

?>
