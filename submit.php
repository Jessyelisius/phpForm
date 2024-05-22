<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminPanel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userName = $_POST['username'];
$email = $_POST['email'];

$checkSql = "SELECT * FROM users WHERE username='$userName'";
$checkResult = $conn->query($checkSql);

if ($checkResult->num_rows > 0) {
    echo "Username already exists. Please choose a different username.";
} else {
    $sql = "INSERT INTO users (username, email) VALUES ('$userName', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
