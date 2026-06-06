<?php

$databaseHost = 'localhost';
$databaseName = 'creativemindx';
$databaseUsername = 'creativemindx-9283';
$databasePassword = 'CLYCtCyno.ht';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Retrieve login credentials
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : '';

// Check if the email and password are not empty
if (empty($email) || empty($password)) {
    echo "Email and password are required.";
    exit();
}

// SQL query to check if the email exists in the database
$sql = "SELECT * FROM login WHERE email = '$email'";
$result = mysqli_query($con, $sql);

// Check if the email exists
if (mysqli_num_rows($result) > 0) {
    // User exists, now verify the password (assuming passwords are stored as plain text, but using hashed passwords is highly recommended)
    $user = mysqli_fetch_assoc($result);
    
    // Compare the entered password with the stored one
    if ($user['password'] === $password) {
        echo "Login successful!";
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User with this email does not exist.";
}

mysqli_close($con);

?>
