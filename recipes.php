<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nutri-Meal Categories</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .section-categories {
      margin: 1% 10% 0 10%;
    }

    .categories {
      margin-bottom: 30px;
      margin-top: 30px;
    }

    .category-item {
      background-color: #ffeb3b;
      /* yellow */
      border-radius: 50%;
      width: 120px;
      height: 120px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: auto;
      transition: all 0.3s ease;
    }

    .category-item:hover {
      background-color: #ffd600;
      transform: scale(1.05);
    }

    .category-text {
      margin-top: 10px;
      font-weight: bold;
      font-size: 16px;
    }



    .swiper {
      width: 1400px;
      height: 380px;
      -webkit-box-shadow: 0.5px 20px 28px 3.5px #ddd;
      -moz-box-shadow: 0.5px 20px 28px 3.5px #ddd;
      box-shadow: 0.5px 20px 28px 3.5px #ddd;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .card.mb-3 a {
      text-decoration: none;
      color: inherit;

    }

    .card.mb-3 a {
      text-decoration: none;
      color: inherit;
    }

    .col-md-4.ps-5 i {
      color: green;
      font-size: 4.7rem;
      transition: transform 0.3s ease;
      padding-top: 10px;

    }

    .col-md-4.ps-5 i:hover {
      transform: scale(1.2);
      color: #ed6d23;
    }



    /* Responsive spacing */
    @media (max-width: 768px) {
      .section-categories {
        margin: 15% 5% 0 5%;
      }
    }
  </style>
</head>

<body>
  <?php include('header.php'); ?>

  <section class="section-categories">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide"> <img src="images/promo 1.jpg" alt="promo 1"> </div>
        <div class="swiper-slide"><img src="images/promo 2.jpg" alt="promo 1"> </div>
        <div class="swiper-slide"><img src="images/promo 3.png" alt="promo 1"> </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    </div>
    <div class="categories text-center" style="color: #ed6d23;">
      <h1><b>CATEGORIES</b></h1>
    </div>
    <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3 column-gap-5  row-gap-5 d-flex justify-content-center">
      <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
          <div class="col-md-4 ps-5">
            <a href="category-view.php?category=Pork">
              <i class="fa-solid fa-bacon fa-6x"></i>
            </a>
          </div>
          <div class="col-md-8">
            <div class="card-body ">
              <div class="card-title d-flex justify-content-center align-item-center">
                <h1><a href="category-view.php?category=Pork">Pork</a></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
          <div class="col-md-4 ps-5">
            <a href="category-view.php?category=Beef">
              <i class="fa-solid fa-cow fa-5x"></i>
            </a>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="card-title d-flex justify-content-center align-item-center">
                <h1><a href="category-view.php?category=Beef">Beef</a></h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
          <div class="col-md-4 ps-5">
            <a href="category-view.php?category=Chicken">
              <i class="fa-solid fa-drumstick-bite fa-6x"></i>
            </a>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="card-title d-flex justify-content-center align-item-center">
                <a href="category-view.php?category=Chicken">
                  <h1> Chicken</h1>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
          <div class="col-md-4 ps-5">
            <a href="category-view.php?category=Vegetable">
              <i class="fa-solid fa-carrot fa-6x"></i>
            </a>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="card-title d-flex justify-content-center align-item-center">
                <a href="category-view.php?category=Vegetable">
                  <h1> Vegetable</h1>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
          <div class="col-md-4 ps-5">
            <a href="category-view.php?category=Dessert">
              <i class="fa-solid fa-cookie fa-6x"></i>
            </a>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="card-title d-flex justify-content-center align-item-center">
                <a href="category-view.php?category=Dessert">
                  <h1> Dessert</h1>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3" style="max-width: 400px;">
        <div class="row g-0">
          <div class="col-md-4 ps-5">
            <a href="category-view.php?category=Fish">
              <i class="fa-solid fa-fish fa-6x"></i>
            </a>
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <div class="card-title d-flex justify-content-center align-item-center">
                <a href="category-view.php?category=Fish">
                  <h1> Fish</h1>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </section>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
</body>

</html>