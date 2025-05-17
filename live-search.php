<?php
$localhost = "localhost";
$username = "root";
$password = "";
$database = "nutri-meals";

$con = new mysqli($localhost, $username, $password, $database);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$query = isset($_GET['query']) ? $_GET['query'] : '';

if (!empty($query)) {
    $stmt = $con->prepare("SELECT id, product_name, product_img, category FROM `admin-series` WHERE product_name LIKE CONCAT('%', ?, '%') LIMIT 5");
    $stmt->bind_param("s", $query);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
} else {
    echo json_encode([]);
}
?>