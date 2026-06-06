<?php

// Enable error reporting for debugging (only in development environment)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'creativemindx';
$databaseUsername = 'creativemindx-9283';
$databasePassword = 'CLYCtCyno.ht';

// Set headers for CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');  // Set the content type as JSON

// Get the ID from the URL (or query parameters)
$id = isset($_GET['id']) ? $_GET['id'] : null;  // Get the ID from query string

// Check if an ID was provided
if ($id === null) {
    // Return a JSON response with an error message
    echo json_encode(['success' => false, 'message' => 'ID parameter is required.']);
    exit();
}

// Establish a database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . mysqli_connect_error()]);
    exit();
}

// Query to fetch data from the database by ID
$query = "SELECT heading, description, images, name, items, days, price, date, overview, include, activity, policy FROM package WHERE id = ?";

// Prepare the statement to prevent SQL injection
$stmt = mysqli_prepare($con, $query);

// Bind the ID parameter to the query
mysqli_stmt_bind_param($stmt, 'i', $id);

// Execute the prepared statement
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Check if any row is returned
if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the row as an associative array
    $row = mysqli_fetch_assoc($result);

    // Split the 'images' field into an array, assuming images are separated by commas
    if (!empty($row['images'])) {
        $row['images'] = explode(',', $row['images']);
    }

    // Return the data as a JSON response with the 'success' status and 'data' array
    echo json_encode(['success' => true, 'data' => $row]);

} else {
    // Return error if no data is found or query fails
    echo json_encode(['success' => false, 'message' => 'No data found for the provided ID.']);
}

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($con);

?>
