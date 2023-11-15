<?php
  $connect = mysqli_connect("localhost", "root", "", "articles");
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
  }

  $query = "SELECT * FROM artikel";
  $result = mysqli_query($connect, $query);
  $articles = [];
  while ($row = mysqli_fetch_array($result)) {
    $articles[] = $row;
  }

  $query = "SELECT * FROM most_read";
  $result = mysqli_query($connect, $query);
  $mostRead = [];
  while ($row = mysqli_fetch_array($result)) {
    $mostRead[] = $row;
  }
  
  mysqli_close($connect);
?>
  const mostReadList = [
    <?php for($i=0;$i<sizeof($mostRead);$i++) {
      if ($i > 0) echo ",";
      echo "{";
      echo "read: '" . $mostRead[$i]["banyak_baca"] . "',";
      echo "title: '" . $mostRead[$i]["judul"] . "',";
      echo "link: '" . $mostRead[$i]["link"] . "'";
      echo "}";
    }?>
  ]

  const articlesList = [
    <?php for($i = 0; $i < sizeof($articles); $i++) {
      if ($i > 0) echo ",";
      echo "{";
      echo "id: " . $articles[$i]["ID"] . ",";
      echo "title: '" . $articles[$i]["Judul"] . "',";
      echo "image: '" . $articles[$i]["Image"] . "',";
      echo "topic: '" . $articles[$i]["Topik"] . "',";
      echo "link: '" . $articles[$i]["Link"] . "'";
      echo "}";
    }?>
  ]
  
  console.log(mostReadList);
  function fetchMostRead() {
    const mostReadContainer = document.querySelector(".most-read ul");
    mostReadList.forEach((article) => {
      const mostReadItem = document.createElement("a");
      mostReadItem.setAttribute("target", "_blank");
      mostReadItem.setAttribute("href", article.link);
      mostReadItem.innerHTML = `
        <li>
          <p>${article.read} read<br><span class="text-dark">${article.title}</span></p>
        </li>
      `;
      mostReadContainer.appendChild(mostReadItem);
    });
  }

  fetchMostRead();

  function fetchArticles() {
    const articlesContainer = document.getElementById("articles");
    console.log(articlesList);
    articlesList.forEach(article => {
      const articleElement = document.createElement("div");
      articleElement.classList.add("col-xxl-2", "col-xl-3", "col-lg-4", "col-sm-6", "col-12", "mb-2", "article", article.topic);

      articleElement.innerHTML = `
        <a href="${article.link}" target="_blank">
          <div class="card">
            <img class="card-img-top" src="${article.image}">
            <div class="card-body">
              <div class="card-title">
                <h6>${article.title}</h6>
              </div>
            </div>
          </div>
        </a>
      `;

      articlesContainer.appendChild(articleElement);
    });
  }

  fetchArticles();

  const navLinks = document.querySelectorAll(".nav-link");

  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      navLinks.forEach((link) => {
        link.classList.remove("active");
      });
      link.classList.add("active");
      const topicName = link.id;
      updateContent(topicName);
    });
  });

  function updateCarousel() {
    const carouselInner = document.getElementById("inner-carousel");
    const carouselIndicators = document.getElementById("indicators-carousel");
    const carouselIndicator = document.getElementById("indicators-carousel");
    const addedItem = [];
    let i = 0;

    while (addedItem.length < 10) {
      const scaledRandomNum = Math.floor(1 + Math.random() * (articlesList.length - 1));

      if (addedItem.includes(scaledRandomNum)) continue;

      addedItem.push(scaledRandomNum);

      const indicator = document.createElement("button");

      indicator.setAttribute("type", "button");
      indicator.setAttribute("data-bs-target", "#demo");
      indicator.setAttribute("data-bs-slide-to", i++);

      carouselIndicator.appendChild(indicator);

      const carouselItem = document.createElement("div");
      carouselItem.classList.add("carousel-item");
      if (i === 1) carouselItem.classList.add("active");

      const article = articlesList[scaledRandomNum];

      carouselItem.innerHTML = `
        <a href="${article.link}" target="_blank">
          <img class="img-fluid" src="${article.image}">
          <div class="carousel-caption">
            <h3>${article.title}</h3>
          </div>
        </a>
      `;

      carouselInner.appendChild(carouselItem);
    }
  }

  function updateContent(contentTopicName) {
    const articles = document.getElementsByClassName("article");
    for (article of articles) {
      article.classList.remove("show");
      article.classList.add("hidden");
    }

    if (contentTopicName === "All") {
      for (article of articles) {
        article.classList.remove("hidden");
        showArticleInView(article);
      }
      return;
    }
    for (article of articles) {
      if (article.classList.contains(contentTopicName)) {
        article.classList.remove("hidden");
        article.classList.add("show");
      }
    }
  }

  function updateNavBar() {
    const width = window.innerWidth;
    const nav = document.querySelector("nav");

    if (width < 992) {
      nav.classList.remove("justify-content-center");
      nav.classList.add("bg-light")
      navLinks.forEach((link) => {
        link.classList.remove("me-5");
      });
    } else {
      nav.classList.add("justify-content-center");
      navLinks.forEach((link) => {
        link.classList.add("me-5");
      });
    }
  }

  updateCarousel();
  updateNavBar();
  window.addEventListener('resize', updateNavBar);

  let bubblesCount;

  window.addEventListener('resize', setBubblesCount);
  window.addEventListener('resize', resetBubbleAnimation);
  window.addEventListener('resize', bubbleAnimation);

  function setBubblesCount() {
    let width = window.innerWidth;
    if (width < 300) {
      bubblesCount = 5;
    }
    else if (width < 600) {
      bubblesCount = 13;
    }
    else if (width < 900) {
      bubblesCount = 25;
    }
    else {
      bubblesCount = 50;
    }
  }

  function resetBubbleAnimation() {
    const bubbles = document.getElementById("bubbles");
    bubbles.innerHTML = "";
  }

  function bubbleAnimation() {
    const bubbles = document.getElementById("bubbles");
    for (let i = 0; i < bubblesCount; i++) {
      const bubble = document.createElement("span");

      const randomVal = Math.floor(Math.random() * 90) + 10;
      bubble.setAttribute('style', `--i:${randomVal};`);

      bubbles.appendChild(bubble);
    }
  }

  setBubblesCount();
  bubbleAnimation();

  window.addEventListener('scroll', showElementInView);
  window.addEventListener('resize', showElementInView);

  function showArticleInView(article) {
    if (isElementInView(article)) {
      article.classList.add("show");
    } else {
      article.classList.remove("show");
    }
  }

  function isElementInView(element) {
    const rect = element.getBoundingClientRect();
    const windowHeight = window.innerHeight;
    if (windowHeight < 600) {
      compensation = 350;
    } else {
      compensation = 100;
    }
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
      (windowHeight || document.documentElement.clientHeight) + compensation &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
  }
  function showElementInView() {
    const articles = document.getElementsByClassName("article");

    for (article of articles) {
      if (isElementInView(article)) {
        article.classList.add("show");
      } else {
        article.classList.remove("show");
      }
    }

  }

  showElementInView();

  $(document).ready(function () {
    $("#search").on("keyup", function () {
      var searchValue = $(this).val().toLowerCase();
      
      $(".article").each(function () {
          var articleTitle = $(this).find(".card-title h6").text().toLowerCase();
          if (articleTitle.includes(searchValue)) {
            this.classList.remove("hidden");
            this.classList.add("show");
          } else {
            this.classList.add("hidden");
            this.classList.remove("show");
          }
      });
    });
  });

  $(document).ready(function() {
    var navbar = $(".navbar");

    $(window).on("scroll", function() {
        if (window.scrollY > 0) {
            navbar.addClass("bg-light");
        } else {
            navbar.removeClass("bg-light");
        }
    });
  });
