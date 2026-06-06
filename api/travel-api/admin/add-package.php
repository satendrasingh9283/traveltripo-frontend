<?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

$databaseHost = 'localhost';
$databaseName = 'bsidrill_traveltripo_portal';
$databaseUsername = 'bsidrill_tripo';
$databasePassword = '9412@123abcABC';

// Set headers for CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('Content-Type: application/json');  // Set the content type as JSON


// Establish database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    // Return error response
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . mysqli_connect_error()]);
    exit;
}

// Check if the form data is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and get the form data
    
    
    
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $title = mysqli_real_escape_string($con, $_POST['title']);
    
    $days = mysqli_real_escape_string($con, $_POST['days']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $hotel_type = mysqli_real_escape_string($con, $_POST['hotel_type']);
    $number = mysqli_real_escape_string($con, $_POST['number']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $images = mysqli_real_escape_string($con, $_POST['images']);
    $food = mysqli_real_escape_string($con, $_POST['food']);
    $transport = mysqli_real_escape_string($con, $_POST['transport']);
    $sightseeing = mysqli_real_escape_string($con, $_POST['sightseeing']);
    
    $video = mysqli_real_escape_string($con, $_POST['video']);
    $policy = mysqli_real_escape_string($con, $_POST['policy']);
    
    $description = mysqli_real_escape_string($con, $_POST['description']);
    
        $status = mysqli_real_escape_string($con, $_POST['status']);
    
  

    // Initialize an empty array to store image paths
    $imagePaths = [];

    // Handle multiple file uploads
    if (isset($_FILES['images']) && $_FILES['images']['error'][0] == 0) {

        // Loop through each uploaded file
        for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
            $imageTmpPath = $_FILES['images']['tmp_name'][$i];
            $imageName = $_FILES['images']['name'][$i];
            $imagePath = "uploads/" . $imageName;

            // Move the uploaded file to the 'uploads' directory
            if (move_uploaded_file($imageTmpPath, $imagePath)) {
                // Add the image path to the array
                $imagePaths[] = $imagePath;
            } else {
                // If an error occurs, you can log it or handle it here
                $imagePaths[] = '';
            }
        }
    }

    // Convert the image paths array to a comma-separated string for storage
    $imagePathsString = implode(',', $imagePaths);

    // Prepare the SQL insert query (ID will auto-increment)
    // $query = "INSERT INTO property_listing (propery_type, city, name, address, number, email, room_type, property_for, landmark, price, days, include, car_parking, swiming_pool, indoor_gym, date, discription, policy)
    
    //           VALUES ('$propery_type', '$city', '$name', '$address', '$number', '$email', '$room_type', '$property_for', '$property_for', '$landmark', '$price', '$days', '$include', '$car_parking', '$swiming_pool', '$indoor_gym', '$date', '$discription', '$policy')";
              
              $query = "INSERT INTO package_list  (city, title, days, price, hotel_type, number, address, images, food, transport, sightseeing, video, policy, description, status)
                                         VALUES ('$city', '$title', '$days', '$price', '$hotel_type',  '$number', '$address', '$images' , '$food', '$transport', '$sightseeing','$video','$policy', '$description', '$status')";


    // Execute the query
    if (mysqli_query($con, $query)) {
        // Success: Data inserted
        echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully.']);
    } else {
        // Error: Query failed
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . mysqli_error($con)]);
    }

} else {
    // Invalid request method
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}

// Close the database connection
mysqli_close($con);

?>
