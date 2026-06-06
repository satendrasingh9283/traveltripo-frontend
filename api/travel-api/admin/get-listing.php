<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'creativemindx';
$databaseUsername = 'creativemindx-9283';
$databasePassword = 'CLYCtCyno.ht';

// Establish database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());  // Output connection error
}

// Check if the request method is GET (fetching data)
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Prepare SQL query to fetch data
    $query = "SELECT * FROM package";
    $result = mysqli_query($con, $query);

    // Check if the query was successful and if there are results
    if ($result) {

        $packages = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $packages[] = $row;
        }

        // Return the data as JSON
        header('Content-Type: application/json');
        echo json_encode($packages);
    } else {
        // Return error if the query failed
        echo json_encode(["error" => "Failed to fetch data", "details" => mysqli_error($con)]);
    }

} else {
    echo json_encode(["error" => "Invalid request method. Use GET to fetch data."]);
}

// Close the database connection
mysqli_close($con);

?>
