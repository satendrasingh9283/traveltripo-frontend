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


// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize user input
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Basic validation
    if (empty($email) || empty($password)) {
        echo "email and password are required.";
        exit();
    }

    // Check if the username already exists
    $sql = "SELECT id FROM tbl_login WHERE email = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Email already taken.";
        $stmt->close();
        $con->close();
        exit();
    }

    // Insert the new user into the database
    $sql = "INSERT INTO tbl_login (email, password) VALUES (?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('ss', $email, $password);

    if ($stmt->execute()) {
        echo "User registered successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
} else {
    echo "Invalid request.";
}

?>