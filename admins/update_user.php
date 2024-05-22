
<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminPanel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['id']) && isset($_POST['username']) && isset($_POST['email'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);

error_log("ID: $id, Username: $userName, Email: $email");

$sql = "UPDATE users SET username='$username', email='$email' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
    }
}
else{
    //debuggung: log the missimg data
    error_log("missing data: ". json_encode($_POST));
    echo "Required data not provided";
}
   

$conn->close();
?>