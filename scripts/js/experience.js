// Experience Section JS

// Experience Timeline
const items = document.querySelectorAll(".timeline-item");
const titleEl = document.getElementById("exp-title");
const companyEl = document.getElementById("exp-company");
const yearEl = document.getElementById("exp-year");

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const item = entry.target;

        titleEl.textContent = item.dataset.title;
        companyEl.textContent = item.dataset.company;
        yearEl.textContent = item.dataset.year;

        items.forEach((i) => i.classList.remove("active"));
        item.classList.add("active");
      }
    });
  },
  {
    root: document.querySelector(".timeline-scroll"),
    threshold: 0.6,
  }
);
items.forEach((item) => observer.observe(item));

// Experience Timeline Drag
const slider = document.querySelector(".timeline-scroll");
let isDown = false;
let startX;
let scrollLeft;

// Mouse Scrolling
slider.addEventListener("mousedown", (e) => {
  isDown = true;
  slider.classList.add("dragging");
  startX = e.pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});
slider.addEventListener("mouseleave", () => {
  isDown = false;
  slider.classList.remove("dragging");
});
slider.addEventListener("mouseup", () => {
  isDown = false;
  slider.classList.remove("dragging");
});
slider.addEventListener("mousemove", (e) => {
  if (!isDown) return;
  e.preventDefault();
  const x = e.pageX - slider.offsetLeft;
  const walk = (x - startX) * 3;
  slider.scrollLeft = scrollLeft - walk;
});

// Touch Scrolling
slider.addEventListener("touchstart", (e) => {
  isDown = true;
  slider.classList.add("dragging");
  startX = e.touches[0].pageX - slider.offsetLeft;
  scrollLeft = slider.scrollLeft;
});

slider.addEventListener("touchend", () => {
  isDown = false;
  slider.classList.remove("dragging");
});

slider.addEventListener("touchmove", (e) => {
  if (!isDown) return;
  const x = e.touches[0].pageX - slider.offsetLeft;
  const walk = (x - startX) * 3;
  slider.scrollLeft = scrollLeft - walk;
});
