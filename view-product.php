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
      line-height: 1.8;
    }

    .instruction-steps li::marker {
      font-weight: bold;
    }

    .vitamins-text {
      margin-top: 20px;
    }

    .card-md {
      padding-top: 50px;
    }

    .top-header {
      padding: 20px;
    }

    .product-name {
      padding-left: 20px
    }

    .category-text {
      padding-left: 20px
    }

    .tab-nav {
      display: flex;
      gap: 2rem;
      border-bottom: 2px solid #ddd;
      margin-bottom: 1rem;
    }

    .tab-button {
      background: none;
      border: none;
      font-weight: 500;
      font-size: 16px;
      padding-bottom: 10px;
      cursor: pointer;
      position: relative;
      color: #555;
    }

    .tab-button:hover {
      color: #000;
    }

    .tab-button.active {
      font-weight: 700;
      color: #000;
    }

    .tab-button.active::after {
      content: '';
      position: absolute;
      width: 100%;
      height: 3px;
      background-color: #ed6d23;
      /* Your active line color */
      bottom: 0;
      left: 0;
    }

    #instructions {
      max-height: 650px;
      /* Adjust height as needed */
      overflow-y: auto;
      padding-right: 10px;
    }

    #vitamins p {
      line-height: 0.3;
      font-size: 18px;
    }

    @media (max-width: 768px) {
      .tab-nav {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
      }

      .tab-button {
        font-size: 14px;
      }

      .instruction-steps li {
        font-size: 16px;
      }

      .col-5,
      .col-7 {
        width: 100%;
      }

      .product-name h1,
      .category-text h4 {
        text-align: center;
      }

      .product-image img {
        width: 100%;
        height: auto;
      }
    }
  </style>

</head>

<body>

  <div class="container-fluid ">
    <div class="row">
      <div class="col-5">
        <div class="card-md ">
          <div class="card">
            <div class="top-header ">
              <a href="category-view.php?category=<?= urlencode($row['category']) ?>">
                <i class="fa-solid fa-arrow-left fa-2x"></i>
              </a>
              <div class="product-image">
                <?php if (!empty($row['product_img'])): ?>
                  <img src="<?= htmlspecialchars($row['product_img']) ?>" alt="Product Image" class=" object-fit-xxl-contain border rounded my-3" style="height: auto ; width: fit-content; border-radius: 10px; display: block; margin: auto;">
                <?php endif; ?>
              </div>
            </div>
            <div class="product-name  d-flex justify-content-center">

              <h1><b><?= htmlspecialchars($row['product_name']) ?></b></h1>

            </div>
            <div class="category-text  d-flex justify-content-center">
              <h4><?= htmlspecialchars($row['category']) ?></h4>
            </div>
          </div>
        </div>
      </div>
      <div class="col-7">
        <div class="container-md ">
          <div class="top-header ">
            <div class="intructions-title d-flex justify-content-evenly" style="margin-top: 20px;">
              <div class="tab-nav w-100 d-flex justify-content-around">
                <button class="tab-button active" data-tab="ingredients">INGREDIENTS</button>
                <button class="tab-button" data-tab="instructions">INSTRUCTION</button>
                <button class="tab-button" data-tab="vitamins">NUTRIENT CONTENT</button>

              </div>
            </div>

            <!-- 🟡 Moved this outside the tab-nav to show below -->
            <div class="tab-content mt-4 px-3">
              <div class="tab-panel" id="ingredients">
                <p><?= nl2br(htmlspecialchars($row['ingredients'])) ?></p>
              </div>

              <div class="tab-panel" id="vitamins" style="display: none;">
                <p><?= nl2br($row['vitamins']) ?></p>
              </div>

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
      </div>


    </div>
  </div>
  </div>
  </div>
  </div>
  </div>

</body>
<script>
  const tabButtons = document.querySelectorAll(".tab-button");
  const tabPanels = document.querySelectorAll(".tab-panel");

  tabButtons.forEach(button => {
    button.addEventListener("click", () => {
      // Remove active from all buttons and hide all panels
      tabButtons.forEach(btn => btn.classList.remove("active"));
      tabPanels.forEach(panel => panel.style.display = "none");

      // Activate clicked button and show corresponding panel
      button.classList.add("active");
      const targetId = button.getAttribute("data-tab");
      document.getElementById(targetId).style.display = "block";
    });
  });
</script>

</html>