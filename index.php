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
  <style>
    /* Add these scroll-snap styles to your existing CSS */

    /* Main scroll container */
    .scroll-snap {
      height: 100vh;
      overflow-y: scroll;
      scroll-snap-type: y mandatory;
      scroll-behavior: smooth;
    }

    /* Make each section snap */
    .hero-section,
    .popular-section,
    .cuisine-slider-section {
      scroll-snap-align: start;
      scroll-snap-stop: always;
      min-height: 100vh;
      position: relative;
      overflow: hidden;
    }

    /* Adjust section heights to fill viewport */
    .hero-section {
      height: 100vh;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .popular-section {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .cuisine-slider-section {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    /* Add scroll indicators */
    .scroll-indicator {
      position: absolute;
      bottom: 30px;
      left: 50%;
      transform: translateX(-50%);
      color: #555;
      font-size: 24px;
      animation: bounce 2s infinite;
      cursor: pointer;
    }

    @keyframes bounce {

      0%,
      20%,
      50%,
      80%,
      100% {
        transform: translateY(0) translateX(-50%);
      }

      40% {
        transform: translateY(-20px) translateX(-50%);
      }

      60% {
        transform: translateY(-10px) translateX(-50%);
      }
    }

    /* Make sure footer doesn't interfere with scroll-snap */
    footer {
      scroll-snap-align: start;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .hero-section {
        padding-top: 80px;
        padding-bottom: 80px;
      }

      .popular-section,
      .cuisine-slider-section {
        padding-top: 60px;
        padding-bottom: 60px;
      }

      .cards-grid {
        overflow-y: auto;
        max-height: 70vh;
        padding-right: 10px;
      }
    }
  </style>

  <body>
    <div class="scroll-snap">
      <!-- Navbar -->
      <!-- Hero Section -->

      <section class="hero-section" id="heroSection">
        <div class="hero-text">
          <h1>Master Healthy Dishes with Our <span class="highlight">Simple</span> and <span class="highlight">Nutritious</span> Recipes</h1>
          <p>Whether you're learning to cook or exploring healthy eating, find the perfect fruit and vegetable recipes for any skill level or craving.</p>

          <button class="btn btn-success" id="exploreRecipesBtn" onclick="window.location.href='recipes.php'">
            <h5 class="pt-2" style="font-family:poppins-regular"><b>Explore Recipes</b></h5>
          </button>
        </div>
        <div class="hero-image">
          <img src="images/nutri-meal.png" alt="Chef with Pizza" loading="lazy">
        </div>

        <!-- Loader only inside hero -->
        <div id="heroLoader" class="hero-loader d-none">
          <div class="spinner-border text-dark" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </section>


      <!-- Popular Recipes Section -->
      <section class="popular-section" id="popularSection">
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
                <p class="card-text">Bicol Express is a popular spicy Filipino dish wherein pork is cooked in coconut milk.</p>
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


      <section class="cuisine-slider-section" id="cuisineSection">
        <div class="cuisine-header">
          <h1> Explore by Cuisine Type</h1>
          <p>Discover new flavors and cooking techniques with our diverse selection of cuisine types.</p>
        </div>

        <div class="slider-wrapper">
          <div class="slider-container" id="slider">
            <div class="slide">
              <div class="image-wrapper">
                <a href="view-product.php?id=21">
                  <img src="images/Batangas Kaldereta.webp " href="#" alt="Appetizers and Snacks">
                </a>
                <div class="overlay-text">
                  <a href="view-product.php?id=21" style="text-decoration: none; color: #fff;">Batangas Kaldereta</a>
                </div>
              </div>
            </div>
            <div class="slide">
              <div class="image-wrapper">
                <a href="view-product.php?id=13">
                  <img src="images/Filipino-Fried-Chicken.jpg" alt="Breakfast">
                </a>
                <div class="overlay-text">
                  <a href="view-product.php?id=13" style="text-decoration: none; color: #fff;"> Filipino Fried Chicken</a>
                </div>
              </div>
            </div>
            <div class="slide">
              <div class="image-wrapper">
                <a href="view-product.php?id=15">
                  <img src="images/ginisang-repolyo-with-egg.jpg" alt="Soups">
                </a>
                <div class="overlay-text" style="text-decoration: none; color: #fff;">
                  <a href="view-product.php?id=15" style="text-decoration: none; color: #fff;"> Ginisang Repolyo </a>
                </div>
              </div>
            </div>
            <div class=" slide">
              <div class="image-wrapper">
                <a href="view-product.php?id=16">
                  <img src="images/fish-sinigang.jpg" alt="Soups">
                </a>
                <div class="overlay-text" style="text-decoration: none; color: #fff;">
                  <a href="view-product.php?id=16" style="text-decoration: none; color: #fff;"> Fish Sinigang </a>
                </div>
              </div>
            </div>
            <div class="slide">
              <div class="image-wrapper">
                <a href="view-product.php?id=24">
                  <img src="images/product_image/igado.jpg" alt="Soups">
                </a>
                <div class="overlay-text" style="text-decoration: none; color: #fff;">
                  <a href="view-product.php?id=24" style="text-decoration: none; color: #fff;"> Igado </a>
                </div>
              </div>
            </div>
            <div class="slide">
              <div class="image-wrapper">
                <a href="view-product.php?id=26">
                  <img src="images/product_image/Beef-Chopsuey.webp" alt="Soups">
                </a>
                <div class="overlay-text" style="text-decoration: none; color: #fff;">
                  <a href="view-product.php?id=26" style="text-decoration: none; color: #fff;"> Beef Chopsuey </a>
                </div>
              </div>
            </div>
            <div class="slide">
              <div class="image-wrapper">
                <a href="view-product.php?id=28">
                  <img src="images/product_image/sarciadong-pechay.jpg" alt="Soups">
                </a>
                <div class="overlay-text" style="text-decoration: none; color: #fff;">
                  <a href="view-product.php?id=28" style="text-decoration: none; color: #fff;"> Sarciadong Pechay </a>
                </div>
              </div>
            </div>
            <div class="slide">
              <div class="image-wrapper">
                <a href="view-product.php?id=27">
                  <img src="images/product_image/pork sinigang.jpg" alt="Soups">
                </a>
                <div class="overlay-text" style="text-decoration: none; color: #fff;">
                  <a href="view-product.php?id=25" style="text-decoration: none; color: #fff;"> Pork Sinigang </a>
                </div>
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
    </div>
    <script>
      // JavaScript for smooth section scrolling and indicators

      document.addEventListener('DOMContentLoaded', function() {
        // Add scroll indicators to each section
        const heroSection = document.getElementById('heroSection');
        const popularSection = document.getElementById('popularSection');
        const cuisineSection = document.getElementById('cuisineSection');

        // Create and add scroll indicators
        const heroIndicator = document.createElement('div');
        heroIndicator.className = 'scroll-indicator';
        heroIndicator.innerHTML = '↓';
        heroIndicator.addEventListener('click', function() {
          popularSection.scrollIntoView({
            behavior: 'smooth'
          });
        });
        heroSection.appendChild(heroIndicator);

        const popularIndicator = document.createElement('div');
        popularIndicator.className = 'scroll-indicator';
        popularIndicator.innerHTML = '↓';
        popularIndicator.addEventListener('click', function() {
          cuisineSection.scrollIntoView({
            behavior: 'smooth'
          });
        });
        popularSection.appendChild(popularIndicator);

        // Intersection Observer to detect which section is in view
        const sections = [heroSection, popularSection, cuisineSection];

        const observerOptions = {
          root: null,
          rootMargin: '0px',
          threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              // Get the id of the current section in view
              const currentSectionId = entry.target.id;

              // Optional: Update URL hash or do something when section changes
              // window.location.hash = '#' + currentSectionId;
            }
          });
        }, observerOptions);

        // Observe all sections
        sections.forEach(section => {
          observer.observe(section);
        });

        // Optional: Add keyboard navigation
        document.addEventListener('keydown', function(e) {
          const currentSection = document.elementFromPoint(window.innerWidth / 2, window.innerHeight / 2);
          let targetSection;

          if (e.key === 'ArrowDown') {
            if (currentSection.closest('#heroSection')) {
              targetSection = popularSection;
            } else if (currentSection.closest('#popularSection')) {
              targetSection = cuisineSection;
            }
          } else if (e.key === 'ArrowUp') {
            if (currentSection.closest('#popularSection')) {
              targetSection = heroSection;
            } else if (currentSection.closest('#cuisineSection')) {
              targetSection = popularSection;
            }
          }

          if (targetSection) {
            targetSection.scrollIntoView({
              behavior: 'smooth'
            });
            e.preventDefault();
          }
        });
      });

      // JavaScript for smooth section scrolling and indicators

      document.addEventListener('DOMContentLoaded', function() {
        // Add scroll indicators to each section
        const heroSection = document.getElementById('heroSection');
        const popularSection = document.getElementById('popularSection');
        const cuisineSection = document.getElementById('cuisineSection');

        // Create and add scroll indicators
        const heroIndicator = document.createElement('div');
        heroIndicator.className = 'scroll-indicator';
        heroIndicator.innerHTML = '↓';
        heroIndicator.addEventListener('click', function() {
          popularSection.scrollIntoView({
            behavior: 'smooth'
          });
        });
        heroSection.appendChild(heroIndicator);

        const popularIndicator = document.createElement('div');
        popularIndicator.className = 'scroll-indicator';
        popularIndicator.innerHTML = '↓';
        popularIndicator.addEventListener('click', function() {
          cuisineSection.scrollIntoView({
            behavior: 'smooth'
          });
        });
        popularSection.appendChild(popularIndicator);

        // Intersection Observer to detect which section is in view
        const sections = [heroSection, popularSection, cuisineSection];

        const observerOptions = {
          root: null,
          rootMargin: '0px',
          threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              // Get the id of the current section in view
              const currentSectionId = entry.target.id;

              // Optional: Update URL hash or do something when section changes
              // window.location.hash = '#' + currentSectionId;
            }
          });
        }, observerOptions);

        // Observe all sections
        sections.forEach(section => {
          observer.observe(section);
        });

        // Optional: Add keyboard navigation
        document.addEventListener('keydown', function(e) {
          const currentSection = document.elementFromPoint(window.innerWidth / 2, window.innerHeight / 2);
          let targetSection;

          if (e.key === 'ArrowDown') {
            if (currentSection.closest('#heroSection')) {
              targetSection = popularSection;
            } else if (currentSection.closest('#popularSection')) {
              targetSection = cuisineSection;
            }
          } else if (e.key === 'ArrowUp') {
            if (currentSection.closest('#popularSection')) {
              targetSection = heroSection;
            } else if (currentSection.closest('#cuisineSection')) {
              targetSection = popularSection;
            }
          }

          if (targetSection) {
            targetSection.scrollIntoView({
              behavior: 'smooth'
            });
            e.preventDefault();
          }
        });
      });
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
    </script>




  </body>

  </html>