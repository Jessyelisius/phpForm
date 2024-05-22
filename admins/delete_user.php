<?php
require_once 'database_con.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user.";
    }
    $stmt->close();
}
?>