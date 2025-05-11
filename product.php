<?php
include 'connection.php';

$id = $_GET['id'] ?? 0;

$conn = new mysqli($localhost, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM admin_series WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if ($product) {
    echo "<h1>" . htmlspecialchars($product['product_name']) . "</h1>";
    // display more product info here
} else {
    echo "Product not found.";
}

$stmt->close();
$conn->close();
