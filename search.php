<?php
$conn = new mysqli("localhost", "root", "", "nutri_meals"); // Update if your credentials differ

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: application/json');

$query = isset($_GET['q']) ? $conn->real_escape_string($_GET['q']) : '';

if ($query === '') {
    echo json_encode([]);
    exit;
}

// Query to match product name
$sql = "SELECT id, product_name, image FROM admin_series WHERE product_name LIKE '%$query%' LIMIT 5";
$result = $conn->query($sql);

$results = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $results[] = [
            'id' => $row['id'],
            'name' => $row['product_name'],
            'image' => $row['image'] // adjust path if needed
        ];
    }
}

echo json_encode($results);
$conn->close();
