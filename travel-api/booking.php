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
    $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $no_of_persons = isset($_POST['no_of_persons']) ? $_POST['no_of_persons'] : '';

    // Validate and sanitize input
    $name = $conn->real_escape_string(trim($name));
    $email = $conn->real_escape_string(trim($email));
    $mobile = $conn->real_escape_string(trim($mobile));
    $date = $conn->real_escape_string(trim($date));
    $no_of_persons = $conn->real_escape_string(trim($no_of_persons));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "message" => "Invalid email format."]);
        exit;
    }

    // Validate that all fields are provided
    if (empty($name) || empty($email) || empty($mobile) || empty($date) || empty($no_of_persons)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    // Prepare and bind the insert query
    $query = "INSERT INTO reservations (name, email, mobile, date, no_of_persons) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $name, $email, $mobile, $date, $no_of_persons);

    // Execute the query
    if ($stmt->execute()) {
        // Send a success response
        echo json_encode(["status" => "success", "message" => "Data inserted successfully."]);
    } else {
        // Send an error response
        echo json_encode(["status" => "error", "message" => "Failed to insert data."]);
    }

    // Close the statement
    $stmt->close();
} else {
    // Method not allowed response
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}

// Close the database connection
$conn->close();
?>
