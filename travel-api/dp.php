<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
$databaseHost = 'localhost';
$databaseName = 'traveltripo_portal';
$databaseUsername = 'trivaletripo9283';
$databasePassword = '_i2m~e%SN!VP';

// Create database connection
$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Close the database connection
$conn->close();
?>
