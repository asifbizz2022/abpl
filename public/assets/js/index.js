// let images = document.querySelectorAll(".multiCardSlider img");
// let currentIndex = 0;
// let interval;
// let isHovered = false;

// function updateActiveImage() {
//   if (isHovered) return;
//   images.forEach((img, index) => {
//     img.classList.remove("active");
//   });
//   images[currentIndex].classList.add("active");
//   currentIndex = (currentIndex + 1) % images.length;
// }

// function startAutoSlide() {
//   clearInterval(interval);
//   interval = setInterval(updateActiveImage, 5000);
// }

// images.forEach((img, index) => {
//   img.addEventListener("mouseenter", () => {
//     isHovered = true;
//     images.forEach((i) => i.classList.remove("active"));
//     img.classList.add("active");
//   });
//   img.addEventListener("mouseleave", () => {
//     isHovered = false;
//   });
//   img.addEventListener("click", () => {
//     currentIndex = index;
//     updateActiveImage();
//     startAutoSlide();
//   });
// });

// updateActiveImage();
// startAutoSlide();

let slides = document.querySelectorAll(".multiCardSlider .position-relative");
let currentIndex = 0;
let interval;
let isHovered = false;

function updateActiveSlide() {
  if (isHovered) return;

  slides.forEach((slide, index) => {
    let img = slide.querySelector("img");
    let caption = slide.querySelector("p");

    // Remove active state from all images and captions
    img.classList.remove("active");
    caption.style.display = "none";
  });

  // Add active state to current image and caption
  let activeSlide = slides[currentIndex];
  let activeImg = activeSlide.querySelector("img");
  let activeCaption = activeSlide.querySelector("p");

  activeImg.classList.add("active");
  activeCaption.style.display = "block";

  currentIndex = (currentIndex + 1) % slides.length;
}

function startAutoSlide() {
  clearInterval(interval);
  interval = setInterval(updateActiveSlide, 5000);
}

slides.forEach((slide, index) => {
  let img = slide.querySelector("img");
  let caption = slide.querySelector("p");

  img.addEventListener("mouseenter", () => {
    isHovered = true;

    // Remove active state from all images and captions
    slides.forEach((s) => {
      s.querySelector("img").classList.remove("active");
      s.querySelector("p").style.display = "none";
    });

    // Set active state to hovered image and caption
    img.classList.add("active");
    caption.style.display = "block";
  });

  img.addEventListener("mouseleave", () => {
    isHovered = false;
  });

  img.addEventListener("click", () => {
    currentIndex = index;
    updateActiveSlide();
    startAutoSlide();
  });
});

updateActiveSlide();
startAutoSlide();
