

<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type");

$databaseHost = 'localhost';
$databaseName = 'techzerox-new1';
$databaseUsername ='techzerox-user';
$databasePassword ='techzerox-new123';

// Create connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Get the ID of the record to delete (for example, from a GET request)
$id = intval($_GET['id']); // Ensure to sanitize this properly

// Prepare the SQL statement
$sql = "DELETE FROM contact_us WHERE id = ?";

// Initialize a statement
$stmt = $con->prepare($sql);

// Bind parameters (i = integer)
$stmt->bind_param('i', $id);

// Execute the statement
if ($stmt->execute()) {
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$con->close();
?>