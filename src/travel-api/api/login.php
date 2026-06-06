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

// Establish a database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    echo json_encode(['success' => false, 'message' => 'Connection failed: ' . mysqli_connect_error()]);
    exit();

// Check if POST data exists
if (isset($_POST['email']) && isset($_POST['password'])) {
    // Get the POST data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute a query to fetch the user
    $sql = "SELECT * FROM login WHERE email = ? and password = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ss', $email, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Fetch the user data
        $stmt->fetch();
        
        // Verify the password
        // You can hash the password securely before checking here (e.g., password_verify)
        if ($stmt->num_rows == 1) {
            // Password is correct
            // $_SESSION['id'] = $id;
            // $_SESSION['email'] = $email;
            echo "Login successful!";
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }

    // Close the statement and connection
    $stmt->close();
} else {
    // Email and password not provided
    echo "Please provide both email and password.";
}

$con->close();

?>
