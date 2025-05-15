  <?php include('header.php'); ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nutri-Meal</title>
    <link rel="stylesheet" href="style.css?v=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
  </head>

  <body>

    <!-- Navbar -->

    <!-- Hero Section -->
    <section class="hero-section" id="heroSection">
      <div class="hero-text">
        <h1>Master Healthy Dishes with Our <span class="highlight">Simple</span> and <span class="highlight">Nutritious</span> Recipes</h1>
        <p>Whether you're learning to cook or exploring healthy eating, find the perfect fruit and vegetable recipes for any skill level or craving.</p>

        <button class="btn btn-success" id="exploreBtn">
          <h5 class="pt-2" style="font-family:poppins-regular"><b>Explore Recipes</b></h5>
        </button>
      </div>
      <div class="hero-image">
        <img src="images/nutri-meal.png" alt="Chef with Pizza">
      </div>

      <!-- Loader only inside hero -->
      <div id="heroLoader" class="hero-loader d-none">
        <div class="spinner-border text-dark" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
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
              <h5 class="card-title">Caldereta</h5>
              <p class="card-text">There’s something about the flavor and texture combination of caldereta </p>
              <a href="view-product.php?id=1" class="btn btn-light">See Full Details</a>
            </div>
          </div>

          <div class="card">
            <img src="images/adobong-manok.jpg" class="card-img-top" alt="Adobo">
            <div class="card-body">
              <h5 class="card-title">Adobong Manok</h5>
              <p class="card-text">Filipino fried chicken is a simple fried chicken version use of basic ingredients.</p>
              <a href="view-product.php?id=19" class="btn btn-light">See Full Details</a>
            </div>
          </div>

          <div class="card">
            <img src="images/nilagang-baka.webp" class="card-img-top" alt="Mechado">
            <div class="card-body">
              <h5 class="card-title">Nilagang Baka </h5>
              <p class="card-text">For a dish you can directly translate into English with the phrase “boiled beef,” </p>
              <a href="view-product.php?id=14" class=" btn btn-light">See Full Details</a>
            </div>
          </div>

          <div class="card">
            <img src="images/Bicol-Express.png" class="card-img-top" alt="Bicol Express">
            <div class="card-body">
              <h5 class="card-title">Bicol Express</h5>
              <p class="card-text">Bicol Express is a popular spicy Filipino dish wherein pork is cooked in coconut milk along with chili peppers.</p>
              <a href="view-product.php?id=20" class="btn btn-light">See Full Details</a>
            </div>
          </div>
        </div>
      </div>
      <div id="popular-loader" style="display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: white; z-index: 1000; justify-content: center; align-items: center;">
        <div class="spinner-border text-dark" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    </section>
    <section class="cuisine-slider-section">
      <div class="cuisine-header">
        <h1> Explore by Cuisine Type</h1>
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
    <footer class="bg-body-tertiary text-center text-lg-start pt-1">
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2025 Credits Belong to:
        <a class="text-body" href="https://panlasangpinoy.com/">panlasangpinoy.com</a>
        <div class="login-button">
          <p> Login as Admin <a class="text-body" href="login.php">Login</a></p>
        </div>
      </div>
      <!-- Copyright -->
    </footer>
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
          slider.scrollTo({
            left: 0,
            behavior: 'smooth'
          });
        } else {
          currentIndex++;
          slider.scrollBy({
            left: slideWidth,
            behavior: 'smooth'
          });
        }
      });

      prevBtn.addEventListener('click', () => {
        if (currentIndex <= 0) { // if at start
          currentIndex = totalSlides - 4;
          slider.scrollTo({
            left: slideWidth * (totalSlides - 4),
            behavior: 'smooth'
          });
        } else {
          currentIndex--;
          slider.scrollBy({
            left: -slideWidth,
            behavior: 'smooth'
          });
        }
      });

      const exploreBtn = document.getElementById('exploreBtn');
      const loader = document.getElementById('heroLoader');
      const heroSection = document.getElementById('heroSection');

      exploreBtn.addEventListener('click', function() {
        loader.classList.remove('d-none');
        exploreBtn.disabled = true;

        // Optional fade-out of hero content
        heroSection.querySelector('.hero-text').style.opacity = '0';
        heroSection.querySelector('.hero-image').style.opacity = '0';

        setTimeout(() => {
          window.location.href = 'recipes.php';
        }, 1000);
      });
      document.addEventListener('DOMContentLoaded', function() {
        const loader = document.getElementById('popular-loader');
        const buttons = document.querySelectorAll('.popular-section .btn');

        buttons.forEach(button => {
          button.addEventListener('click', function(e) {
            e.preventDefault();

            // Show spinner overlay
            loader.style.display = 'flex';

            // Optional delay before navigating
            setTimeout(() => {
              window.location.href = this.href;
            }, 800);
          });
        });
      });
    </script>




  </body>

  </html>