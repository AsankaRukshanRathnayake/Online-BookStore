const slider = document.querySelector('.slider');
const cards = document.querySelectorAll('.card');
const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');
let currentIndex = 0;

function updateButtons() {
  prevButton.disabled = currentIndex === 0;
  nextButton.disabled = currentIndex === cards.length - 4;
}

function slide(direction) {
  if (direction === 'next') {
    currentIndex = Math.min(currentIndex + 1, cards.length - 1);
  } else {
    currentIndex = Math.max(currentIndex - 1, 0);
  }

  const translateXValue = -currentIndex * (cards[0].offsetWidth + 20); // Card width + margin
  slider.style.transform = `translateX(${translateXValue}px)`;

  updateButtons();
}

prevButton.addEventListener('click', () => slide('prev'));
nextButton.addEventListener('click', () => slide('next'));

// Initial button state update
updateButtons();