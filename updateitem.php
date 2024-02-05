<?php

$servername = "localhost";
$username = "root";
$password = "NTOWT0kq!";
$database = "tcc";
	

$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$itemId = $_POST['id'];
$itemName = $_POST['name'];
$itemQuantity = $_POST['quantity'];
$itemPrice = $_POST['price'];

$sql = "UPDATE items SET name = ?, quantity = ?, price = ? WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("sidi", $itemName, $itemQuantity, $itemPrice, $itemId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Item updated successfully";
    } else {
        echo "No changes made or item not found";
    }

    $stmt->close();
} else {
    echo "Error preparing statement: " . $conn->error;
}

// Close connection
$conn->close();

?>