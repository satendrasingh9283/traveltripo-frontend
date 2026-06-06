<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Images</title>
</head>
<body>
    <form action="create-profile.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="images">Upload Images:</label>
        <input type="file" id="images" name="images[]" multiple required><br><br>
        <input type="file" id="images" name="images[]" multiple required><br><br>
        <input type="file" id="images" name="images[]" multiple required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>