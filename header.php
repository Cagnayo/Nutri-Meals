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
      display: none;
      width: 300px;
    }

    .search-result-item.active,
    .search-result-item:hover {
      background-color: #e6f3e6;
      /* light green highlight */
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
          <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="recipes.php">All Recipes</a></li>
            <li><a href="index.php">About</a></li>
          </ul>
        </nav>
        <form id="search-form" class="search-form" role="search">
          <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="search-input" autocomplete="off" />
          <div class="search-result d-flex justify-content-center">
            <div id="search-results" class="position-absolute bg-white border w-500 rounded mt-1 p-2 border" style="z-index: 1000;"></div>
          </div>
        </form>
      </div>
    </header>

    <script>
      const searchInput = document.getElementById("search-input");
      const resultsContainer = document.getElementById("search-results");
      const searchForm = document.getElementById("search-form");

      function performSearch(query) {
        if (query.length === 0) {
          resultsContainer.innerHTML = "";
          resultsContainer.style.display = "none";
          return;
        }

        resultsContainer.style.display = "block";

        fetch(`live-search.php?query=${encodeURIComponent(query)}`)
          .then(res => res.json())
          .then(data => {
            resultsContainer.innerHTML = "";

            if (data.length === 0) {
              resultsContainer.innerHTML = "<div class='p-2 text-muted'>No results found.</div>";
              return;
            }

            data.forEach(product => {
              const item = document.createElement("div");
              item.classList.add("d-flex", "align-items-center", "p-2", "search-result-item");
              item.style.cursor = "pointer";
              item.innerHTML = `
            <img src="${product.product_img}" alt="${product.product_name}" style="width: 100px; height: 50px; object-fit: cover; margin-right: 10px;">
            <div>
              <div style="font-weight: bold;">${product.product_name}</div>
              <div class="text-muted">${product.category}</div>
            </div>
          `;

              item.addEventListener("click", () => {
                window.location.href = `view-product.php?id=${product.id}`;
              });

              resultsContainer.appendChild(item);
            });
          })
          .catch(err => {
            console.error(err);
            resultsContainer.innerHTML = "<div class='p-2 text-danger'>Something went wrong.</div>";
          });
      }

      // Trigger search on typing
      searchInput.addEventListener("input", () => {
        const query = searchInput.value.trim();
        performSearch(query);
      });

      // Trigger search on Enter
      searchForm.addEventListener("submit", (e) => {
        e.preventDefault();
        const query = searchInput.value.trim();

        fetch(`live-search.php?query=${encodeURIComponent(query)}`)
          .then(res => res.json())
          .then(data => {
            if (data.length > 0) {
              // Redirect to the first result
              window.location.href = `view-product.php?id=${data[0].id}`;
            } else {
              resultsContainer.innerHTML = "<div class='p-2 text-muted'>No results found.</div>";
              resultsContainer.style.display = "block";
            }
          })
          .catch(err => {
            console.error(err);
            resultsContainer.innerHTML = "<div class='p-2 text-danger'>Something went wrong.</div>";
            resultsContainer.style.display = "block";
          });
      });

      // Hide results on outside click
      document.addEventListener("click", (e) => {
        if (!resultsContainer.contains(e.target) && e.target !== searchInput) {
          resultsContainer.style.display = "none";
        }
      });
    </script>

  </body>

  </html>