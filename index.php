<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nutri-Meal</title>
  <link rel="stylesheet" href="style.css?v=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>

<!-- Navbar -->
<?php include ('header.php');
?>

<!-- Hero Section -->
<section class="hero-section">
  <div class="hero-text">
    <h1>Cook Like a Pro with Our <span class="highlight">Easy</span> and <span class="highlight">Tasty</span> Recipes</h1>
    <p>From quick and easy meals to gourmet delights, we have something for every taste and occasion.</p>
    <a href="#" class="btn btn-success">Explore all Recipes</a>
  </div>
  <div class="hero-image">
    <img src="images/nutri-meal.png" alt="Chef with Pizza">
  </div>
</section>

<!-- Popular Recipes Section -->
<section class="popular-section">
  <div class="popular-recipes">
    <h1>Popular Recipes You Can't Miss</h1>
    <p>From comfort food classics to exotic flavors, our featured recipes are sure to impress.</p>
  </div>

  <div class="container-card">
    <div class="cards-grid">
      <div class="card">
        <img src="images/Caldereta.jpg" class="card-img-top" alt="Caldereta">
        <div class="card-body">
          <h5 class="card-title">Creamy Tomato Basil Soup</h5>
          <p class="card-text">This comforting soup is made with fresh tomatoes.</p>
          <a href="#" class="btn btn-light">See Full Details</a>
        </div>
      </div>

      <div class="card">
        <img src="images/adobong-manok.jpg" class="card-img-top" alt="Adobo">
        <div class="card-body">
          <h5 class="card-title">Spicy Shrimp Tacos</h5>
          <p class="card-text">These tacos are loaded with juicy shrimp marinated in a spicy blend of chili powder.</p>
          <a href="#" class="btn btn-light">See Full Details</a>
        </div>
      </div>

      <div class="card">
        <img src="images/mechado.jpg" class="card-img-top" alt="Mechado">
        <div class="card-body">
          <h5 class="card-title">Chicken Parmesan</h5>
          <p class="card-text">This classic Italian dish features tender chicken breasts coated in crispy breadcrumbs.</p>
          <a href="#" class="btn btn-light">See Full Details</a>
        </div>
      </div>

      <div class="card">
        <img src="images/Bicol-Express.png" class="card-img-top" alt="Bicol Express">
        <div class="card-body">
          <h5 class="card-title">Chocolate Chip Cookies</h5>
          <p class="card-text">These cookies are the perfect balance of chewy and crispy, melted chocolate.</p>
          <a href="#" class="btn btn-light">See Full Details</a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="cuisine-slider-section">
  <div class="cuisine-header">
    <h1>Explore by Cuisine Type</h1>
    <p>Discover new flavors and cooking techniques with our diverse selection of cuisine types.</p>
  </div>

  <div class="slider-wrapper">
    <div class="slider-container" id="slider">
      <div class="slide">
        <div class="image-wrapper"> 
          <a href="#"> 
            <img src="images/adobong-manok.jpg " href="#" alt="Appetizers and Snacks">
          </a>
            <div class="overlay-text">
              <a href="#" style="text-decoration: none; color: #fff;">Appetizers and Snacks</a>
            </div>
        </div>
      </div>
      <div class="slide">
        <div class="image-wrapper">
          <img src="images/adobong-manok.jpg" alt="Breakfast">
          <div class="overlay-text">Breakfast</div>
        </div>
      </div>
      <div class="slide">
        <div class="image-wrapper">
          <img src="images/adobong-manok.jpg" alt="Soups">
          <div class="overlay-text">Soups</div>
        </div>
      </div>
      <div class="slide">
        <div class="image-wrapper">
          <img src="images/adobong-manok.jpg" alt="Mixed Dishes">
          <div class="overlay-text">Mixed Dishes</div>
        </div>
      </div>
      <div class="slide">
        <div class="image-wrapper">
          <img src="images/adobong-manok.jpg" alt="Salad" href="#">
          <div class="overlay-text">Salads</div>
        </div>
      </div>
      <div class="slide">
        <div class="image-wrapper">
          <img src="images/adobong-manok.jpg" alt="Desserts">
          <div class="overlay-text">Desserts</div>
        </div>
      </div>
      <div class="slide">
        <div class="image-wrapper">
          <img src="images/adobong-manok.jpg" alt="Seafood">
          <div class="overlay-text">Seafood</div>
        </div>
      </div>
      <div class="slide">
        <div class="image-wrapper">
          <img src="images/adobong-manok.jpg" alt="Noodles">
          <div class="overlay-text">Noodles</div>
        </div>
      </div>
    </div>

    <div class="button-wrapper">
      <button class="arrow-btn" id="prevBtn">←</button>
      <button class="arrow-btn" id="nextBtn">→</button>
    </div>
  </div>
</section>



<!-- Slider Script -->
<script>
  const slider = document.getElementById('slider');
  const nextBtn = document.getElementById('nextBtn');
  const prevBtn = document.getElementById('prevBtn');

  const slides = slider.querySelectorAll('.slide');
  const slideWidth = slides[0].clientWidth + 20; // slide width + margin
  const totalSlides = slides.length;

  let currentIndex = 0;

  nextBtn.addEventListener('click', () => {
    if (currentIndex >= totalSlides - 4) { // if last visible image group
      currentIndex = 0;
      slider.scrollTo({ left: 0, behavior: 'smooth' });
    } else {
      currentIndex++;
      slider.scrollBy({ left: slideWidth, behavior: 'smooth' });
    }
  });

  prevBtn.addEventListener('click', () => {
    if (currentIndex <= 0) { // if at start
      currentIndex = totalSlides - 4;
      slider.scrollTo({ left: slideWidth * (totalSlides - 4), behavior: 'smooth' });
    } else {
      currentIndex--;
      slider.scrollBy({ left: -slideWidth, behavior: 'smooth' });
    }
  });
</script>




</body>
</html>
