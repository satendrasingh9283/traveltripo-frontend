<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'traveltr_traveltripo9283';
$databaseUsername = 'traveltr_tripo9283';
$databasePassword = '_i2m~e%SN!VP';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');

// Establish database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());  // Output connection error
}
// Set the content type to JSON for the response
header('Content-Type: application/json');

// Check if the 'id' parameter is present
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare and execute the DELETE query
    $sql = "DELETE FROM hotel_list WHERE id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id); // 'i' means the parameter is an integer

    if ($stmt->execute()) {
        // Check if any row was affected
        if ($stmt->affected_rows > 0) {
            // Return success response
            echo json_encode(["status" => "success", "message" => "Record deleted successfully."]);
        } else {
            // If no row was affected, maybe the ID does not exist
            echo json_encode(["status" => "error", "message" => "No record found with the given ID."]);
        }
    } else {
        // Return failure response
        echo json_encode(["status" => "error", "message" => "Failed to delete the record."]);
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Return error if 'id' is missing
    echo json_encode(["status" => "error", "message" => "Missing 'id' parameter."]);
}

// Close the database connection
$con->close();
?>