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

    // Get form data
    $itemName = $_POST["name"];
    $itemQuantity = $_POST["quantity"];
    $itemPrice = $_POST["price"];

    // SQL to insert data into the items table
    $sql = "INSERT INTO items (name, quantity, price) VALUES ('$itemName', '$itemQuantity', '$itemPrice')";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "Item added successfully";
    } else {
        echo "Error adding item: " . $conn->error;
    }

    // Close connection
    $conn->close();

    header("Location: index.php");
    exit();
}

?>