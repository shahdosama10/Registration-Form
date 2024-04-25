<?php
include 'DB_Ops.php';
include 'Upload.php';

// create object from DB model
$dbModel = new DBModel();
$imageUploader = new ImageUploader();

// create Database 
$result = $dbModel->createDB();

// if there was an error creating the database
if ($result != 'Done') {

    echo $result;

} else {
    // create table
    $result = $dbModel->createTable();

    // if there was an error creating the table
    if ($result != 'Done') {
        echo $result;
    } else {

        // get the username
        $userName = $_POST['user_name'];

        // select the username to apply the server side validation
        $num_of_row = $dbModel->selectUsername($userName);

        // if the username is already in the database
        if ($num_of_row != 0) {

            echo "Username is already exists";

        } else {

            // get the rest of the data from the input
            $fullName = $_POST['full_name'];
            $birthDate = $_POST['birthdate'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $user_image = basename($_POST['user_image']);

            // Upload image to the server
            $uploadResponse = $imageUploader->uploadImage($_FILES['user_image']);

            // Check the upload response
            if ($uploadResponse === "Image uploaded successfully.") {
                

                // Insert the user data into the database
                $response = $dbModel->insertUser($fullName, $userName, $birthDate, $phone, $address, $password, $email, $user_image);

                // Output the response from the database insertion
                echo $response;
            } else {
                // Output the upload error
                echo $uploadResponse;
            }


        }

    }
}


// close the connection of the database

$dbModel->close();

?>