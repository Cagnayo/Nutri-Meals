<?php
include('connection.php');
include('header.php');

if (!isset($_GET['id'])) {
    echo "No product ID provided.";
    exit();
}

$id = intval($_GET['id']);
$stmt = $con->prepare("SELECT * FROM `admin-series` WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Product not found.";
    exit();
}

$row = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($row['product_name']) ?> - Details</title>
  <link rel="stylesheet" href="style.css?v=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
  .product-container {
    max-width: 800px;
    margin: 40px auto;
    border: 1px solid #ccc;
    padding: 25px;
    border-radius: 10px;
  }
  img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
  }
  .instruction-steps {
    padding-left: 20px;
  }
  .instruction-steps li {
    margin-bottom: 12px;
    font-size: 16px;
    line-height: 1.6;
  }

  .instruction-steps li::marker {
    font-weight: bold;
  }
</style>

</head>
<body>

<div class="container product-container">
  <h2><?= htmlspecialchars($row['product_name']) ?></h2>
  <p><strong>Category:</strong> <?= htmlspecialchars($row['category']) ?></p>
  
  <?php if (!empty($row['product_img'])): ?>
    <img src="<?= htmlspecialchars($row['product_img']) ?>" alt="Product Image" class="img-fluid my-3">
  <?php endif; ?>

  <h4>Ingredients</h4>
  <p><?= nl2br(htmlspecialchars($row['ingredients'])) ?></p>

  <h4>Vitamins</h4>
  <p><?= nl2br($row['vitamins']) ?></p>

  <?php if (!empty($row['instruction'])): ?>
  <h4>Instructions</h4>
  <ol class="instruction-steps">
    <?php
      $steps = preg_split('/\r\n|\r|\n/', $row['instruction']);
      foreach ($steps as $step) {
          if (trim($step) !== '') {
              echo '<li>' . htmlspecialchars($step) . '</li>';
          }
      }
    ?>
  </ol>
<?php endif; ?>

  <a href="admin.php" class="btn btn-secondary mt-3">Back to Admin Panel</a>
</div>

</body>
</html>
