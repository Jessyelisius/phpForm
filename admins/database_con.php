-- CREATE DATABASE myDatabase;

-- USE adminPanel;

-- CREATE TABLE users (
--     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(30) NOT NULL,
--     email VARCHAR(50)
-- );

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminPanel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>