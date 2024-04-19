<?php
class ImageUploader {
    private $uploadDir;

    public function __construct($uploadDir = 'uploads/') {
        $this->uploadDir = $uploadDir;
    }

    public function uploadImage($file) {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($file)) {
            // Get file name
            $fileName = basename($file["name"]);
            $targetFilePath = $this->uploadDir . $fileName;

            // Store the file to the server
            if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
                return "Image uploaded successfully.";
            } else {
                return "Error uploading file.";
            }
        } else {
            return "Invalid request.";
        }
    }
}

?>
