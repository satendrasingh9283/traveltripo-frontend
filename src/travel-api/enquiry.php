<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'creativemindx';
$databaseUsername = 'creativemindx-9283';
$databasePassword = 'CLYCtCyno.ht';

// Create database connection
$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the posted data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $number = isset($_POST['number']) ? $_POST['number'] : '';
    $packageType = isset($_POST['package_type']) ? $_POST['package_type'] : '';

    // Validate and sanitize input
    $name = $conn->real_escape_string(trim($name));
    $email = $conn->real_escape_string(trim($email));
    $number = $conn->real_escape_string(trim($number));
    $packageType = $conn->real_escape_string(trim($packageType));

    // Prepare and bind the insert query
    if (!empty($name) && !empty($email) && !empty($number) && !empty($packageType)) {
        $query = "INSERT INTO users (name, email, number, package_type) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssss", $name, $email, $number, $packageType);

        // Execute the query
        if ($stmt->execute()) {
            // Send a success response
            echo json_encode(["status" => "success", "message" => "Data inserted successfully."]);
        } else {
            // Send an error response
            echo json_encode(["status" => "error", "message" => "Failed to insert data."]);
        }

        $stmt->close();
    } else {
        // Send a validation error response
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
    }
} else {
    // Method not allowed response
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

// Close the database connection
$conn->close();
?>
