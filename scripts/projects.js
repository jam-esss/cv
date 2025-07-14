document.addEventListener("DOMContentLoaded", function () {
  const items = document.querySelectorAll(".projects-ctr ul li");
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && entry.intersectionRatio > 0.95) {
          entry.target.classList.add("project-centered");
        } else {
          entry.target.classList.remove("project-centered");
        }
      });
    },
    {
      threshold: [0.95],
      root: null,
    }
  );
  items.forEach((item) => observer.observe(item));
});
