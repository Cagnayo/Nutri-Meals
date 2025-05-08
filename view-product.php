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
    .back-button {
      padding: 15px 0px;
    }

    .container.mt-5 button i {
      color: green;
    }

    .container.mt-5 button i:hover {
      color: white;
    }

    .container.mt-5 .btn-outline-success:hover i {
      color: white;
    }

    .card-title {
      font-size: 3.5rem;
      /* Adjust font size to match <h1> */
      font-weight: bold;
      
    }
    .card-body h4 {
      font-size: 2rem;
      /* Adjust font size to match <h2> */
      font-weight: bold;
    }
  </style>

</head>

<body>

  <div class="container-xxl ">
    <div class="back-button ">
      <a href="category-view.php?category=<?= urlencode($row['category']) ?>">
        <button type=" button" class="btn btn-outline-success">
          <i class="fa-solid fa-arrow-left fa-2x "></i>
        </button>
      </a>
    </div>
  </div>
  <section>
    <div class="container-lg pt-4">
      <div class="product-image">
        <?php if (!empty($row['product_img'])): ?>
          <div class="card mb-3" style="width: 100%; height: 100%;">
            <div class="row g-0">
              <div class="col-md-7">
                <img src="<?= htmlspecialchars($row['product_img']) ?>" alt="Product Image" class=" object-fit-xxl-contain border rounded my-3" style="height: auto ; width:auto ;">
              <?php endif; ?>
              </div>
              <div class="col-md-5">
                <div class="card-body">
                  <h3 class="card-title "><?= htmlspecialchars($row['product_name']) ?></h3>
                  <h4><?= htmlspecialchars($row['category']) ?></h4>
                  <p class="card-text mt-10"><?= nl2br(htmlspecialchars($row['description'])) ?></p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>

</html>