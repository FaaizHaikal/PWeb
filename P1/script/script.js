function triggerTab(tabName) {
  var i, tabContents, tabLinks, targetTabLinks, targetTabContent;
  tabContents = document.getElementsByClassName("tab-contents");
  tabLinks = document.getElementsByClassName("tab-links");
  targetTabContent = document.getElementById(tabName);
  targetTabLinks = document.getElementById(tabName+"-link");

  if (targetTabContent.classList.contains("active") || targetTabLinks.classList.contains("active")) {
    targetTabContent.classList.remove("active");
    targetTabLinks.classList.remove("active");
    return;
  }

  for (i = 0; i < tabContents.length; i++) {
    tabContents[i].classList.remove("active");
  }
  

  for (i = 0; i < tabLinks.length; i++) {
    tabLinks[i].classList.remove("active");
  }
  
  document.getElementById(tabName).classList.add("active");
  document.getElementById(tabName+"-link").classList.add("active");
}

window.addEventListener('resize', setBubblesCount);
window.addEventListener('resize', resetBubbleAnimation);
window.addEventListener('resize', bubbleAnimation);

let bubblesCount;
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


function seeMore(tabName){
  var targetTab;
  targetTab = document.getElementById(tabName);

  if (targetTab.classList.contains("active")) {
    targetTab.classList.remove("active");
    return;
  }

  targetTab.classList.add("active");
}

function openSideMenu() {
  document.getElementById("side-menu").style.right = "0px";
}

function closeSideMenu() {
  document.getElementById("side-menu").style.right = "-200px";
}


let sections = document.querySelectorAll("section");
let navLinks = document.querySelectorAll("header nav a");

window.onscroll = () => {
  sections.forEach(sec => {
    let top = window.scrollY;
    let offset = sec.offsetTop - 150;
    let height = sec.offsetHeight;
    let id = sec.getAttribute("id");

    if (top >= offset && top < offset + height) {
      navLinks.forEach(links => {
        links.classList.remove("active");
        document.querySelector("header nav a[href*=" + id + "]").classList.add("active");
      });
    }
  })
}

// Reference: https://github.com/jamiewilson/form-to-google-sheets
const scriptURL = 'https://script.google.com/macros/s/AKfycbx6banN1kCRdywAWsovVhVX7MpZQP06tHLTShXUdPJ--ymcE8_ZeMeJ4PkACMyUn72aZA/exec'
const form = document.forms['response-to-my-website']

form.addEventListener('submit', e => {
  e.preventDefault()
  fetch(scriptURL, { method: 'POST', body: new FormData(form)})
    .then(response => console.log('Success!', response))
    .catch(error => console.error('Error!', error.message))
})