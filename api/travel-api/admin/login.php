<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// DB details
$databaseHost = 'localhost';
$databaseName = 'bsidrill_traveltripo_portal';
$databaseUsername = 'bsidrill_tripo';
$databasePassword = '9412@123abcABC';

// Set headers for CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');  // Set the content type as JSON


// Connect DB
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if (!$con) {
    die(json_encode(["success" => false, "message" => "DB Connection failed: " . mysqli_connect_error()]));
}

// Read values
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if (empty($username) || empty($password)) {
    echo json_encode(["success" => false, "message" => "Username and password are required."]);
    exit;
}

// Prepare query
$stmt = $con->prepare("SELECT id, username, password FROM login WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

// Bind result columns
$stmt->bind_result($id, $db_username, $db_password);

// Fetch record
if ($stmt->fetch()) {

    // verify password (plain text check)
    if ($password === $db_password) {

        echo json_encode([
            "success" => true,
            "message" => "Login successful",
            "data" => [
                "id" => $id,
                "username" => $db_username
            ]
        ]);

    } else {
        echo json_encode(["success" => false, "message" => "Invalid username or password"]);
    }

} else {
    echo json_encode(["success" => false, "message" => "Invalid username or password"]);
}

$stmt->close();
mysqli_close($con);

?>
