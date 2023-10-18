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
      showArticleInView(article);
    }
  }
}

function updateCarousel() {
  const articles = document.getElementsByClassName("article");
  const carouselInner = document.getElementById("inner-carousel");
  const carouselIndicator = document.getElementById("indicators-carousel");
  const addedItem = [];
  let i = 1;
  
  while (addedItem.length < 10) {
    const scaledRandomNum = Math.floor(1 + Math.random() * (articles.length - 1));

    if (addedItem.includes(scaledRandomNum)) {
      continue;
    }
    addedItem.push(scaledRandomNum);
    // Update carousel indicators
    const indicator = document.createElement("button");

    indicator.setAttribute("type", "button");
    indicator.setAttribute("data-bs-target", "#demo");
    indicator.setAttribute("data-bs-slide-to", i++);

    carouselIndicator.appendChild(indicator);

    // Update carousel items
    const item = document.createElement("div");
    const img = document.createElement("img");
    const caption = document.createElement("div");
    const h3 = document.createElement("h3");
    const a = document.createElement("a");

    item.classList.add("carousel-item");
    caption.classList.add("carousel-caption");

    const clonedImg = articles[scaledRandomNum].querySelector("img");
    const clonedH6 = articles[scaledRandomNum].querySelector("h6");
    const link = articles[scaledRandomNum].querySelector("a");

    img.src = clonedImg.src;
    h3.textContent = clonedH6.textContent;
    a.href = link.href;
    a.target = "_blank";

    caption.appendChild(h3);

    a.appendChild(img);
    a.appendChild(caption);

    item.appendChild(a);

    carouselInner.appendChild(item);
  }
}

updateCarousel();
updateNavBar();

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
  const compensation = 100;
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <=
    (window.innerHeight || document.documentElement.clientHeight) + compensation &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}
function showElementInView() {

  const searchBar = document.getElementsByClassName("search-bar")[0];

  if (isElementInView(searchBar)) {
    searchBar.classList.add("show");
  } else {
    searchBar.classList.remove("show");
  }

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

