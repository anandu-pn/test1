<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
</head>
<body>
    <form action="view.php" method="post" enctype="multipart/form-data">
        <label>Select image to upload:</label>
        <input type="file" name="image" accept="image/*"><br><br>
        <input type="submit" value="Upload Image">
    </form>
</body>
</html>
