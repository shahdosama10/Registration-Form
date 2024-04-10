<?php
$servername = "localhost:3306";
$username = "root";
$password = "";

// connect to database

$conn = mysqli_connect($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS registeration";
if (mysqli_query($conn,$sql) === FALSE) {
    echo "Error creating database";
} else {
    // Select database
    $conn->select_db("registeration");
    // Create table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        full_name VARCHAR(255) NOT NULL,
        user_name VARCHAR(255) NOT NULL,
        birthdate DATE,
        phone VARCHAR(20),
        address VARCHAR(255),
        password VARCHAR(255) NOT NULL,
        user_image VARCHAR(255),
        email VARCHAR(255) NOT NULL 
    )";

    if (mysqli_query($conn,$sql) === FALSE) {
        echo "Error creating table";
    } else {


        // initialize variables

        $fullName=mysqli_real_escape_string($conn, $_POST['full_name']);
        $birthDate=mysqli_real_escape_string($conn, $_POST['birthdate']);
        $phone=mysqli_real_escape_string($conn, $_POST['phone']);
        $userName=mysqli_real_escape_string($conn, $_POST['user_name']);
        $address=mysqli_real_escape_string($conn, $_POST['address']);
        $password=mysqli_real_escape_string($conn, $_POST['password']);
        $email=mysqli_real_escape_string($conn, $_POST['email']);
        $user_image = mysqli_real_escape_string($conn, basename($_POST['user_image'])); 


        // server side validation

        // check if user already exists

        $result=mysqli_query($conn, "SELECT * FROM users WHERE user_name='$userName'");

        

        if(mysqli_num_rows($result)!=0){

            // if user already exists, display message
            echo "username is already exist";

        } else {
            
            // insert into database
            $sql = "INSERT INTO users (full_name, user_name, birthdate, phone, address, password, email, user_image)
            VALUES ('$fullName', '$userName', '$birthDate', '$phone', '$address', '$password', '$email', '$user_image')";

            if (mysqli_query($conn,$sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } else {
                echo "Sign up successfully";
            }
        }

        
    }
}

// close connection
$conn->close();
?>