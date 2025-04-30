<?php
include 'connection.php';

$category = isset($_GET['category']) ? $_GET['category'] : '';
if (!$category) {
    echo "No category selected.";
    exit();
}

$stmt = $con->prepare("SELECT * FROM `admin-series` WHERE category = ?");
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<title><?= htmlspecialchars($category) ?> Recipes</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"/>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php  include 'header.php'?>
    <div class="container mt-5">
    <h2><?= htmlspecialchars($category) ?> Recipes</h2>
    <div class="row">
        <?php while($row = $result->fetch_assoc()): ?>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="<?= htmlspecialchars($row['product_img']) ?>" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['product_name']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars(substr($row['ingredients'], 0, 80)) ?>...</p>
                    <a href="view-product.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">View Details</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>