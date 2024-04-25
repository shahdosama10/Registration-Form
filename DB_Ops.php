<?php

class DBModel {
    private $servername = "localhost:3306";
    private $username = "root";
    private $password = "";
    private $conn;

    // Constructor
    public function __construct() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

       
    }

    // Function to create database
    public function createDB() {
        $sql = "CREATE DATABASE IF NOT EXISTS registeration";

        if (mysqli_query($this->conn , $sql) === FALSE) {

            return "Error creating database : " . $this->conn->error;
        } else {
            return "Done";
        }
    }

    // Function to create table
    public function createTable() {

        $this->conn->select_db("registeration");

        $sql = "CREATE TABLE IF NOT EXISTS users (
            full_name VARCHAR(255) NOT NULL,
            user_name VARCHAR(255) NOT NULL PRIMARY KEY,
            birthdate DATE,
            phone VARCHAR(20),
            address VARCHAR(255),
            password VARCHAR(255) NOT NULL,
            user_image VARCHAR(255),
            email VARCHAR(255) NOT NULL 
        )";

        if (mysqli_query($this->conn , $sql) === FALSE) {
            return "Error creating table: " . $this->conn->error;
        } else {
            return "Done";
        }
    }

    // Function to select username (server side validation)
    public function selectUsername($userName) {
        $userName = $this->conn->real_escape_string($userName);
        $result = mysqli_query( $this->conn , "SELECT * FROM users WHERE user_name='$userName'");
        return mysqli_num_rows($result);
    }

    // Function to insert user
    public function insertUser($fullName, $userName, $birthDate, $phone, $address, $password, $email, $user_image) {

        // mysqli_real_escape_string escapes special characters in a string for safe SQL usage, preventing SQL injection.

        $fullName = mysqli_real_escape_string($this->conn ,$fullName);
        $birthDate = mysqli_real_escape_string($this->conn ,$birthDate);
        $phone = mysqli_real_escape_string($this->conn ,$phone);
        $userName = mysqli_real_escape_string($this->conn ,$userName);
        $address = mysqli_real_escape_string($this->conn ,$address);
        $password = mysqli_real_escape_string($this->conn , $password);
        $email = mysqli_real_escape_string($this->conn ,$email);
        $user_image = mysqli_real_escape_string($this->conn ,$user_image);

        
        $sql = "INSERT INTO users (full_name, user_name, birthdate, phone, address, password, email, user_image)
        VALUES ('$fullName', '$userName', '$birthDate', '$phone', '$address', '$password', '$email', '$user_image')";

        if (mysqli_query($this->conn , $sql) === FALSE) {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        } else {
            return "Sign up successfully";
        }
        
    }

    // Close connection
    public function close() {
        $this->conn->close();
    }
}
?>
