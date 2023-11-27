const prevButton = document.getElementById('prevBtn');
const nextButton = document.getElementById('nextBtn');
const slide = document.querySelector('.carousel-slide');

let counter = 0;
const slideWidth = document.querySelectorAll('.carousel-slide img')[0].clientWidth;

nextButton.addEventListener('click', () => {
  if (counter >= document.querySelectorAll('.carousel-slide img').length - 1) return;
  counter++;
  slide.style.transform = `translateX(${-slideWidth * counter}px)`;
});

prevButton.addEventListener('click', () => {
  if (counter <= 0) return;
  counter--;
  slide.style.transform = `translateX(${-slideWidth * counter}px)`;
});