<!-- upload image php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["user_image"])) {
    $uploadDir = "uploads/";
    $fileName = $_FILES["user_image"]["name"];
    $targetFilePath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES["user_image"]["tmp_name"], $targetFilePath)) {
        echo "Image uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "Invalid request.";
}
?>