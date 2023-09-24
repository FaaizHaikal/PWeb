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