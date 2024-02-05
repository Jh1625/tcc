<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "NTOWT0kq!";
    $database = "tcc";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get item ID from the AJAX request
    $itemId = $_POST["id"];

    // SQL to delete item
    $sql = "DELETE FROM items WHERE id = $itemId";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "Item deleted successfully";
    } else {
        echo "Error deleting item: " . $conn->error;
    }

    // Close connection
    $conn->close();

    header("Location: index.php");
    exit();
}

?>