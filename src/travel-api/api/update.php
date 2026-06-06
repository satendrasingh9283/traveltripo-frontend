

<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
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

// Get form data
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

// Validate inputs (basic example)
if (empty($id) || empty($name) || empty($email)) {
    die("All fields are required.");
}


        
// Prepare the SQL update statement
$sql = "UPDATE contact_us SET name = ?, email = ? WHERE id = ?";
$stmt = $con->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: " . $con->error);
}

// Bind parameters
$stmt->bind_param("ssi", $name, $email, $id);

// Execute the statement
if ($stmt->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$con->close();

?>