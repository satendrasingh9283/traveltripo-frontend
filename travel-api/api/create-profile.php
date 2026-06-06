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
$name = $_POST['name'];
$email = $_POST['email'];

// Insert user data into database
$sql = "INSERT INTO create_profile (name, email) VALUES (?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $name, $email);
$stmt->execute();
$user_id = $stmt->insert_id; // Get the ID of the newly inserted user
$stmt->close();

// Upload images
if (!empty($_FILES['images']['name'][0])) {
    $uploadDir = 'uploads/';
    
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; // Allowed file types
    $maxFileSize = 2 * 1024 * 1024; // Maximum file size (2MB)

    foreach ($_FILES['images']['name'] as $key => $imageName) {
        $tmpName = $_FILES['images']['tmp_name'][$key];
        $fileType = $_FILES['images']['type'][$key];
        $fileSize = $_FILES['images']['size'][$key];

        // Validate file type and size
        if (in_array($fileType, $allowedTypes) && $fileSize <= $maxFileSize) {
            $filePath = $uploadDir . basename($imageName);

            if (move_uploaded_file($tmpName, $filePath)) {
                // Insert image data into the database
                $sql = "INSERT INTO user_images (user_id, file_path) VALUES (?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("is", $user_id, $filePath);
                $stmt->execute();
                $stmt->close();
            } else {
                echo "Failed to upload file: $imageName<br>";
            }
        } else {
            echo "Invalid file type or size for file: $imageName<br>";
        }
    }
}

$con->close();
echo "Form submitted successfully.";
?>