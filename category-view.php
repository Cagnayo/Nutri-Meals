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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Poppins", sans-serif;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            margin-bottom: 20px;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        h2.section-title {
            padding-bottom: 20px;
            text-align: center;
            font-weight: bold;
            color: #ed6d23;
            font-size: 3.5rem;
        }

        .btn-outline-success i {
            color: green;
        }

        .btn-outline-success:hover i {
            color: white;
        }

        .card-text {
            min-height: 70px;
        }
    </style>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="container mt-5">
        <a href="Recipes.php" class="btn btn-outline-success mb-3">
            <i class="fa-solid fa-arrow-left fa-2x"></i>
        </a>

        <h2 class="section-title"><?= htmlspecialchars(ucfirst($category)) ?> Recipes</h2>

        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card shadow-sm">
                        <a href="view-product.php?id=<?= $row['id'] ?>">
                            <img src="<?= htmlspecialchars($row['product_img']) ?>" class="card-img-top img-fluid" alt="Product Image">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['product_name']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars(substr(strip_tags($row['ingredients']), 0, 80)) ?>...</p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>