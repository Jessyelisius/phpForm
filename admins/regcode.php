<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminPanel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminUsername = $_POST['username'];
    $adminPassword = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO admins (username, password) VALUES ('$adminUsername', '$adminPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "New admin registered successfully";
        header('Location: login.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>