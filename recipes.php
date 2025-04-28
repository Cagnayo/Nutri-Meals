<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nutri-Meal Categories</title>
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
      background-color: #ffeb3b; /* yellow */
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

    .category-link {
      text-decoration: none;
      color: black;
    }
    .swiper {
      width: 1400px;
      height: 300px;
      border: solid 1px black;
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
      <div class="swiper-slide">Slide 1</div>
      <div class="swiper-slide">Slide 2</div>
      <div class="swiper-slide">Slide 3</div>
      <div class="swiper-slide">Slide 4</div>
      <div class="swiper-slide">Slide 5</div>
    </div>
    <div class="swiper-pagination"></div>
  </div>
  </div>
  <div class="categories text-center">
    <h1>Top Categories</h1>
  </div>

  <div class="container">
    <div class="row g-4 justify-content-center">
      
      <!-- Example Category -->
      <div class="col-4 col-sm-3 col-md-2 text-center">
        <a href="#" class="category-link">
          <div class="category-item">
            <img src="your-icon-path/chicken.png" alt="Chicken" width="50">
          </div>
          <div class="category-text">Chicken</div>
        </a>
      </div>

      <div class="col-4 col-sm-3 col-md-2 text-center">
        <a href="#" class="category-link">
          <div class="category-item">
            <img src="your-icon-path/pork.png" alt="Pork" width="50">
          </div>
          <div class="category-text">Pork</div>
        </a>
      </div>

      <div class="col-4 col-sm-3 col-md-2 text-center">
        <a href="#" class="category-link">
          <div class="category-item">
            <img src="your-icon-path/dessert.png" alt="Dessert" width="50">
          </div>
          <div class="category-text">Dessert</div>
        </a>
      </div>

      <!-- ADD MORE CATEGORIES SAME FORMAT -->
      <!-- Example Placeholder -->
      <div class="col-4 col-sm-3 col-md-2 text-center">
        <a href="#" class="category-link">
          <div class="category-item">
            <img src="your-icon-path/beef.png" alt="Beef" width="50">
          </div>
          <div class="category-text">Beef</div>
        </a>
      </div>
      <div class="col-4 col-sm-3 col-md-2 text-center">
        <a href="#" class="category-link">
          <div class="category-item">
            <img src="your-icon-path/beef.png" alt="Beef" width="50">
          </div>
          <div class="category-text">Beef</div>
        </a>
      </div>
      <div class="col-4 col-sm-3 col-md-2 text-center">
        <a href="#" class="category-link">
          <div class="category-item">
            <img src="your-icon-path/beef.png" alt="Beef" width="50">
          </div>
          <div class="category-text">Beef</div>
        </a>
      </div>
      <div class="col-4 col-sm-3 col-md-2 text-center">
        <a href="#" class="category-link">
          <div class="category-item">
            <img src="your-icon-path/beef.png" alt="Beef" width="50">
          </div>
          <div class="category-text">Beef</div>
        </a>
      </div>
      <div class="col-4 col-sm-3 col-md-2 text-center">
        <a href="#" class="category-link">
          <div class="category-item">
            <img src="your-icon-path/beef.png" alt="Beef" width="50">
          </div>
          <div class="category-text">Beef</div>
        </a>
      </div>
      <div class="col-4 col-sm-3 col-md-2 text-center">
        <a href="#" class="category-link">
          <div class="category-item">
            <img src="your-icon-path/beef.png" alt="Beef" width="50">
          </div>
          <div class="category-text">Beef</div>
        </a>
      </div>
      <div class="col-4 col-sm-3 col-md-2 text-center">
        <a href="#" class="category-link">
          <div class="category-item">
            <img src="your-icon-path/beef.png" alt="Beef" width="50">
          </div>
          <div class="category-text">Beef</div>
        </a>
      </div>
      <div class="col-4 col-sm-3 col-md-2 text-center">
        <a href="#" class="category-link">
          <div class="category-item">
            <img src="your-icon-path/beef.png" alt="Beef" width="50">
          </div>
          <div class="category-text">Beef</div>
        </a>
      </div>
      <div class="col-4 col-sm-3 col-md-2 text-center">
        <a href="#" class="category-link">
          <div class="category-item">
            <img src="your-icon-path/beef.png" alt="Beef" width="50">
          </div>
          <div class="category-text">Beef</div>
        </a>
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
