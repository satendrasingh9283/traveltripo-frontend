<?php

// Enable error reporting for debugging (only in development environment)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
// Database connection details
$databaseHost = 'localhost';
$databaseName = 'traveltr_traveltripo9283';
$databaseUsername = 'traveltr_tripo9283';
$databasePassword = '_i2m~e%SN!VP';

// Set headers for CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');  // Set the content type as JSON

// Establish a database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . mysqli_connect_error()]);
    exit();
}

// Query to fetch data from the database
$query = "SELECT id, heading, description, images, name, items, days, price, date, city, property, overview, include, activity, policy FROM package";

// Execute the query
$result = mysqli_query($con, $query);

// Check if the query was successful and rows are found
if ($result) {
    // Initialize an empty array to hold the fetched data
    $data = [];

    // Fetch all rows from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Split the 'images' field into an array, assuming images are separated by commas
        if (!empty($row['images'])) {
            $row['images'] = explode(',', $row['images']);
        }

        // Add the row to the data array
        $data[] = $row;
    }

    // Return the data as a JSON response
    echo json_encode(['success' => true, 'data' => $data]);

} else {
    // Return error if the query fails
    echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($con)]);
}

// Close the database connection
mysqli_close($con);

?>
