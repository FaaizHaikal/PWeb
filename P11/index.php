<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./lib/css/bootstrap.min.css">
  <script src="./lib/js/bootstrap.bundle.min.js"></script>
  <script src="./lib/js/jquery-3.7.1.min.js"></script>
</head>
<body>
  <div class="custom-container logo">
    <h1>Mathemagicians</h1>
    <div class="search-bar">
      <input class="form-control" id="search" type="text" placeholder="Search">
    </div>
  </div>
  <nav class="navbar navbar-expand-lg justify-content-center sticky-top">
    <div class="custom-container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link me-5 text-nowrap active" id="All">All</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-5 text-nowrap" id="NumTheory">Number Theory</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-5 text-nowrap" id="Algebra">Algebra</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-5 text-nowrap" id="Geometry">Geometry</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-5 text-nowrap" id="Combinatorics">Combinatorics</a>
          </li>
          <li class="nav-item">
            <a class="nav-link me-5 text-nowrap" id="Applications">Applications</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="bubbles"></div>
  <div class="custom-container">
    <div class="row">
      <div class="col-xl-10">
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators" id="indicators-carousel">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          </div>
          <div class="carousel-inner" id="inner-carousel">
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>
      <div class="col-xl-2 most-read">
        <div class="decoration" style="margin-bottom: 10px;"></div>
        <h3>Most Read</h3>
        <ul>
        </ul>
        <div class="decoration"></div>
      </div>
    </div>
  </div>

  <div class="custom-container">
    <div class="row" id="articles">
    </div>
  </div>

  <footer class="text-center p-3">
    Tugas Pemrograman Web Jurusan Teknik Informatika ITS 2023 <br>
    5025221219, Faa'iz Haikal Hilmi <br>
    Dosen: Imam Kuswardayan, S.Kom, M.T
  </footer>
    <script src="script.php"></script>
</body>
</html>