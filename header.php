<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nutri-Meal</title>
  <link rel="stylesheet" href="style.css?v=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  header {
    position: sticky;
    top: 0;
    width: 100%;
    padding: 20px 50px;
    background-color: #fff;
    z-index: 1000;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    top: 0;

  }

  .header-container {
    max-width: 100%;
    padding: 0 8%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    font-family: "poppins-light";
  }

  .header-container a.color-green {
    color: green;
  }

  .header-container a.color-orange {
    color: #ed6d23;
  }

  .logo {
    font-size: 35px;
    font-weight: bold;
  }

  .logo a {
    text-decoration: none;
    color: inherit;
    font-family: 'Poppins', sans-serif;
  }

  .nav-links {
    list-style: none;
    display: flex;
    gap: 60px;
    justify-content: center;
    align-items: center;
    margin-top: 20px;

  }

  .nav-links li a {
    color: black;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3 ease;
  }

  .nav-links li a {
    position: relative;
    /* Required for ::before to be positioned absolutely */
  }

  .nav-links li a::before {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    left: 0;
    bottom: -5px;
    background-color: green;
    transition: width 0.3s ease;
  }

  .nav-links li a:hover {
    color: green;
  }

  .nav-links li a:hover::before {
    width: 100%;
  }

  .search-form input {
    border-radius: 20px;
    border: none;
    padding: 5px 15px;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
    margin-right: 130px;
  }

  #search-results {
    max-height: 200px;
    overflow-y: auto;
  }

  .search-result-item:hover {
    background-color: #f0f0f0;
  }

  /* RESPONSIVENESS */
  @media (max-width: 991px) {

    /* Hide original navbar */
    .header-container {
      display: none;
    }
  }

  @media (max-width: 1173px) {
    .search-form {
      width: 100%;
      margin-top: 10px;
    }

    .nav.ul.li.a {
      display: flex;
      gap: 20px;
      justify-content: flex-end;
      background-color: red;
    }

    .search-form input {
      width: 100%;
      margin-right: 0;
    }
  }

  @media (max-width: 480px) {
    .logo {
      font-size: 28px;
    }

    .header-container {
      padding: 15px;
    }
  }
</style>

<body>
  <!-- Desktop Navbar (your design) -->
  <header>
    <div class="header-container">
      <div class="logo">
        <a href="index.php" class="color-green">Nutri</a>
        <a href="index.php" class="color-orange">Meal</a>
      </div>
      <nav>
        <ul class="nav-links ">
          <li><a href="index.php">Home</a></li>
          <li><a href="recipes.php">All Recipes</a></li>
          <li><a href="index.php">About</a></li>
        </ul>
      </nav>
      <form class="search-form" role="search" onsubmit="return false;">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="search-input" />
        <div id="search-results" class="position-absolute bg-white border rounded w-100 mt-1 p-2" style="z-index: 1000;"></div>
      </form>
    </div>
  </header>

  <!-- Mobile Navbar with Offcanvas (bootstrap) -->
  <nav class="navbar bg-body-tertiary fixed-top d-lg-none">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <span class="color-green">Nutri</span><span class="color-orange">Meal</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Nutri-Meal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="recipes.php">All Recipes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="course.php">Course</a>
            </li>
          </ul>
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    results.forEach(product => {
      const item = document.createElement('div');
      item.classList.add('d-flex', 'align-items-center', 'p-2', 'search-result-item');
      item.style.cursor = 'pointer';

      item.innerHTML = `
    <img src="${product.image}" alt="${product.name}" style="width: 50px; height: auto; margin-right: 10px;">
    <div>
      <div style="font-weight: bold;">${product.name}</div>
      <div class="text-muted">₱${product.price}</div>
    </div>
  `;

      item.addEventListener('click', () => {
        window.location.href = `view-product.php?id=${product.id}`;
      });

      resultsContainer.appendChild(item);
    });
    searchInput.addEventListener('keydown', function(e) {
      if (e.key === 'Enter' && resultsContainer.firstChild) {
        e.preventDefault(); // stop form from submitting
        const firstResult = resultsContainer.firstChild;
        firstResult.click(); // simulate click on first result
      }
    });
  </script>

</body>

</html>