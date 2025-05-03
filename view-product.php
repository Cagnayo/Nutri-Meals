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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .instruction-steps {
      padding-left: 0;
      list-style-position: inside;
    }

    .instruction-steps li {
      margin-bottom: 12px;
      font-size: 20px;
      line-height: 1.6;
    }

    .instruction-steps li::marker {
      font-weight: bold;
    }

    .vitamins-text {
      margin-top: 20px;
    }
  </style>

</head>

<body>

  <div class="container-fluid ">
    <div class="row">
      <div class="col-5">
        <div class="container-md border">
          <div class="top-header ">
            <a href="category-view.php?category=<?= urlencode($row['category']) ?>">
              <i class="fa-solid fa-arrow-left fa-2x"></i>
            </a>

            <div class="category-text  d-flex justify-content-center">
              <h4> <?= htmlspecialchars($row['category']) ?></h4>
            </div>
          </div>
          <div class="product-name  d-flex justify-content-center">
            <h1><?= htmlspecialchars($row['product_name']) ?></h1>
          </div>
          <div class="product-image">
            <?php if (!empty($row['product_img'])): ?>
              <img src="<?= htmlspecialchars($row['product_img']) ?>" alt="Product Image" class=" object-fit-xxl-contain border rounded my-3" style="height: 260px ; width: fit-content; border-radius: 10px; display: block; margin: auto;">
            <?php endif; ?>
          </div>
          <div class="ingredients-text ">
            <h4>Ingredients</h4>
          </div>
          <div class="ingredients-details border row">
            <?php
            $ingredients = preg_split('/\r\n|\r|\n/', $row['ingredients']);
            foreach ($ingredients as $item) {
              if (trim($item) !== '') {
                echo '<div class="col-6 mb-2"><p class="mb-0">' . htmlspecialchars($item) . '</p></div>';
              }
            }
            ?>
          </div>
        </div>
      </div>
      <div class="col-7 border">
        <div class="container-md border">
          <div class="top-header border">
            <div class="intructions-title d-flex  justify-content-start" style="margin-top: 20px;">
              <h3> Instructions</h3>
            </div>
          </div>
          <div class="intructions-text">
            <?php if (!empty($row['instruction'])): ?>
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
          </div>
          <div class="vitamins-text ">
            <div class="vitamins-title">
              <h4>Vitamins</h4>
            </div>
            <p><?= nl2br($row['vitamins']) ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>