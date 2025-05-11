<?php
$localhost = 'localhost';
$username = 'root';
$password = '';
$database = 'nutri-meals';


$conn = new mysqli($localhost, $username, $password, $database);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

$query = strtolower(trim($_GET['q'] ?? ''));
if (empty($query)) {
    echo json_encode([]);
    exit;
}

// Assuming the table name is 'admin_series' and column is 'product_name'
$stmt = $conn->prepare("SELECT id, product_name FROM admin_series WHERE product_name LIKE CONCAT('%', ?, '%') LIMIT 10");
$stmt->bind_param("s", $query);
$stmt->execute();
$result = $stmt->get_result();

$results = [];
while ($row = $result->fetch_assoc()) {
    $results[] = [
        'id' => $row['id'],
        'name' => $row['product_name']
    ];
}

echo json_encode($results);

$stmt->close();
$conn->close();
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
