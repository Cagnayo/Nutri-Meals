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
  <title><?= htmlspecialchars($row['product_name']) ?> </title>
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

    .btn-warning {
      background-color: green;
      border-color: green;

    }

    .btn-warning:hover {
      background-color: #ed6d23;
      border-color: #ed6d23;

    }

    .btn-warning h6 {
      color: white;
      margin-top: 4px;
      padding: 2px 2px 1px 2px;
      font-size: 1rem;
      font-family: "poppins-regular", sans-serif;

    }

    .card-title {
      font-size: 4rem;
      /* Adjust font size to match <h1> */
      font-weight: bold;
      margin-left: -5px;
      color: #ed6d23;
    }

    .vitamin-content {
      font-size: 1rem;
      font-family: "poppins-light", sans-serif;
    }

    .lower-buttons {
      display: flex;
      justify-content: start;
      gap: 2rem;
      padding: 20px 0px;

    }

    .ingredients-button {
      margin-left: 20px;
      background-color: #ed6d23;
      border-color: #ed6d23;
      color: white;
      font-size: 1rem;
      padding: 8px 20px;
      border-radius: 60px;
      height: 40px;
      font-family: "poppins-regular";
    }

    .instruction-button {
      margin-left: 20px;
      background-color: #ed6d23;
      border-color: #ed6d23;
      color: white;
      font-size: 1rem;
      padding: 8px 20px;
      border-radius: 60px;
      height: 40px;
      font-family: "poppins-regular";

    }

    .lower-card {
      background-color: #fffafa;

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
                  <div class="nutrient-content">
                    <p>
                      <button class="btn btn-warning" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                        <h6 class=""> NUTRIENT CONTENT</h6>
                      </button>
                    </p>
                    <div style="min-height: 150px;">
                      <div class="collapse collapse-horizontal" id="collapseWidthExample">
                        <div class="card card-body" style="width: 500px;">
                          <div class="vitamin-content">
                            <div>
                              <?= nl2br(htmlspecialchars_decode($row['vitamins'])) ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container-lg ">
      <div class="lower-buttons ">
        <button type="button" class="btn btn-danger ingredients-button" id="ingredientsBtn">INGREDIENTS</button>
        <button type="button" class="btn btn-danger instruction-button" id="instructionsBtn">INSTRUCTIONS</button>
      </div>
    </div>
    <div class=" lower-card container-lg">
      <div class="card mb-3 ">
        <div class="ingredients-tab ">
          <div class="ingredients-title">
            <div id="ingredientsHeader">
              <h1> INGREDIENTS</h1>
              <p>"These are the ingredients you'll need for this recipe. Make sure to prep them before starting!"</p>
            </div>
            <div class="tab-panel " id="ingredients" style="display: block;">
              <p><?= nl2br(htmlspecialchars($row['ingredients'])) ?></p>
            </div>
          </div>
        </div>
  <div class="instruction-tab">
          <h1> INSTRUCTIONS</h1>
        <p> "These are the ingredients you'll need for this recipe. Make sure to prep them before starting!"</p>
        <?php if (!empty($row['instruction'])): ?>
          <div class="tab-panel" id="instructions" style="display: none;">
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
          </div>
        <?php endif; ?>
  </div>
      </div>
    </div>
  </section>

</html>
<script>
  const ingredientsBtn = document.getElementById("ingredientsBtn");
  const instructionsBtn = document.getElementById("instructionsBtn");
  const ingredientsPanel = document.getElementById("ingredients");
  const instructionsPanel = document.getElementById("instructions");
  const ingredientsHeader = document.getElementById("ingredientsHeader");

  ingredientsBtn.addEventListener("click", function() {
    ingredientsPanel.style.display = "block";
    if (instructionsPanel) instructionsPanel.style.display = "none";
    if (ingredientsHeader) ingredientsHeader.style.display = "block";
  });

  instructionsBtn.addEventListener("click", function() {
    if (instructionsPanel) instructionsPanel.style.display = "block";
    ingredientsPanel.style.display = "none";
    if (ingredientsHeader) ingredientsHeader.style.display = "none";
  });
</script>

</body>