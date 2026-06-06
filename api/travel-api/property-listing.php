 
    <?php

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection details
 $databaseHost = 'localhost';
$databaseName = 'creativemindx';
$databaseUsername ='creativemindx-9283';
$databasePassword ='CLYCtCyno.ht';

// Establish database connection
$con = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());  // Output connection error
}

// Check if the form data is submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitize and get the form data
    $heading = mysqli_real_escape_string($con, $_POST['heading']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $items = mysqli_real_escape_string($con, $_POST['items']);
    $days = mysqli_real_escape_string($con, $_POST['days']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    
   $city = mysqli_real_escape_string($con, $_POST['city']);
   $property = mysqli_real_escape_string($con, $_POST['property']);
    
    $overview = mysqli_real_escape_string($con, $_POST['overview']);
    $include = mysqli_real_escape_string($con, $_POST['include']);
    $activity = mysqli_real_escape_string($con, $_POST['activity']);
    $policy = mysqli_real_escape_string($con, $_POST['policy']);

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
    $query = "INSERT INTO package (heading, description, images, name, items, days, price, date, city, property, overview, include, activity, policy)
              VALUES ('$heading', '$description', '$imagePathsString', '$name', '$items', '$days', '$price', '$date', '$city', '$property', '$overview', '$include', '$activity', '$policy')";

    // Execute the query
    if (mysqli_query($con, $query)) {
        // Success: Data inserted
        echo "Data inserted successfully.";
    } else {
        // Error: Query failed
        echo "Error: " . mysqli_error($con);
    }

} else {
    echo "Invalid request method.";
}

// Close the database connection
mysqli_close($con);

?>
