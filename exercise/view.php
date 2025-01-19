<!DOCTYPE html>
<html>
<head>
    <title>View Image</title>
</head>
<body>
    <h1>Uploaded Image</h1>
    <?php
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_file = "uploads/" . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.<br>";
            echo "<img src='" . htmlspecialchars($target_file) . "' alt='Uploaded Image'>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file uploaded or there was an error uploading the file.";
    }
    ?>
</body>
</html>
