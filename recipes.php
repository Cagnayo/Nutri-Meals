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

    .fade-in {
      opacity: 0;
      transform: translateY(30px);
      animation: fadeInUp 1s forwards;
    }

    .col-lg-3.col-md-4.col-sm-6.fade-in a {
      text-decoration: none;
      color: green;
    }

    .col-lg-3.col-md-4.col-sm-6.fade-in h1 a {
      font-family: 'Poppins-light', sans-serif;
      font-size: 2rem;
      color: black;
      font-weight: bold;
      transition: color 0.3s ease;
    }

    .hover-card {
      transition: transform 0.3s, box-shadow 0.3s;
      background-color: #FFFEFE;
      border-radius: 13px;
      height: 140px;
  
    }

    .hover-card:hover {
      transform: translateY(-7px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .hover-card a i {
      color: inherit;
      text-decoration: none;
      transition: color 0.3s;
    }

    .hover-card a {
      color: inherit;
      text-decoration: none;

    }

    .hover-card i {
      transition: transform 0.4s ease, color 0.3s ease;
      color: black;
    }

    .hover-card:hover i {
      transform: scale(1.2);
      color: #f26522;
      /* Orange */
    }

    .hover-card a:hover {
      color: green;
      /* Text link turns green on hover */
    }

    .hover-card a:hover {
      color: #f26522;
      /* Optional: change text/icon color on hover */
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
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
    <div class="swiper mySwiper" style="height:300px;">
      <div class="swiper-wrapper">
        <div class="swiper-slide"> <img src="images/promo 1.jpg" alt="promo 1"> </div>
        <div class="swiper-slide"><img src="images/promo 2.jpg" alt="promo 1"> </div>
        <div class="swiper-slide"><img src="images/promo 3.png" alt="promo 1"> </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    </div>
    <div class="container text-center my-5">
      <h2 class="fw-bold text-uppercase" style="color: #f26522; font-size:4rem; font-family:'poppins';">Categories</h2>
      <!-- First Row: 3 items -->
      <div class="row justify-content-center g-4 mt-4">
        <div class="col-lg-3 col-md-4 col-sm-6 fade-in">
          <div class="p-3 border hover-card">
            <a href="category-view.php?category=Pork">
              <i class="fa-solid fa-bacon fa-4x"></i>
            </a>
            <div class="card-title d-flex justify-content-center align-item-center">
              <h1><a href="category-view.php?category=Pork">Pork</a></h1>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 fade-in">
          <div class="p-3 border  hover-card">
            <a href="category-view.php?category=Beef">
              <i class="fa-solid fa-cow fa-4x"></i>
            </a>
            <div class="card-title d-flex justify-content-center align-item-center">
              <h1><a href="category-view.php?category=Beef">Beef</a></h1>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 fade-in">
          <div class="p-3 border hover-card">
            <a href="category-view.php?category=Chicken">
              <i class="fa-solid fa-drumstick-bite fa-4x"></i>
            </a>
            <div class="card-title d-flex justify-content-center align-item-center">
              <h1><a href="category-view.php?category=Chicken"> Chicken</a></h1>
            </div>
          </div>
        </div>
      </div>

      <!-- Second Row: 2 items centered -->
      <div class="row justify-content-center g-4 mt-2 ">
        <div class="col-lg-3 col-md-4 col-sm-6 fade-in">
          <div class="p-3 border  hover-card">
            <a href="category-view.php?category=Vegetable">
              <i class="fa-solid fa-carrot fa-4x"></i>
            </a>
            <div class="card-title d-flex justify-content-center align-item-center">
              <h1><a href="category-view.php?category=Vegetable"> Vegetable</a></h1>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 fade-in">
          <div class="p-3 border  hover-card">
            <a href="category-view.php?category=Fish">
              <i class="fa-solid fa-fish fa-4x"></i>
            </a>
            <div class="card-title d-flex justify-content-center align-item-center">
              <h1><a href="category-view.php?category=Fish"> Fish</a></h1>
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