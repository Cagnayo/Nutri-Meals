<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Nutri-Meal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <!-- Navbar -->
  <header>
    <div class="logo">Nutri-Meal</div>
    <nav>
      <ul class="nav-links">
        <li><a href="#">Services</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">About</a></li>
      </ul>
    </nav>
    <form class="search-form d-flex" role="search">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" />
    </form>
  </header>

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
    <div class="container-card"> 
      <div class="popular-recipes text-center">
        <h1>Popular Recipes</h1>
        <p>From quick and easy meals to gourmet delights, we have something for every taste and occasion.</p>
      </div>
    </div>

    <div class="img-container d-flex justify-content-center">
      <div class="d-inline-flex p-2 gap-4 flex-wrap">
        <!-- Example Cards -->
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-warning">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-warning">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-warning">Go somewhere</a>
          </div>
        </div>
        <div class="card" style="width: 18rem;">
          <img src="..." class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-warning">Go somewhere</a>
          </div>
        </div>
        
        <!-- Repeat for other cards as needed -->
      </div>
    </div>
  </section>
</body>
</html>
