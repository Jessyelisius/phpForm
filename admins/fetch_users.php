<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
require_once 'database_con.php';
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "adminPanel";

// $conn = new mysqli($servername, $username, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td><button class='btn btn-primary edit' data-id='" . $row['id'] . "'>Edit</button></td>";
        echo "<td><button class='btn btn-primary delete-button' data-id='{$row['id']}'>Delete</button>
        </td>";
        
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No users found</td></tr>";
}

$conn->close();

