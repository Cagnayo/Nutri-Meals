<?php
include 'connection.php';

        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $pageTitle = "All Recipes";

        if ($id) {
            $stmt = $con->prepare("SELECT * FROM `admin-series` WHERE id = ?");
            $stmt->bind_param("i", $id);
            $pageTitle = "Recipe Details";
        } elseif ($name) {
            $nameParam = "%$name%";
            $stmt = $con->prepare("SELECT * FROM `admin-series` WHERE product_name LIKE ?");
            $stmt->bind_param("s", $nameParam);
            $pageTitle = "Search Results for " . htmlspecialchars($name);
        } elseif ($category) {
            $stmt = $con->prepare("SELECT * FROM `admin-series` WHERE category = ?");
            $stmt->bind_param("s", $category);
            $pageTitle = htmlspecialchars($category) . " Recipes";
        } else {
            $stmt = $con->prepare("SELECT * FROM `admin-series`");
        }


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