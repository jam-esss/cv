document.addEventListener("DOMContentLoaded", function () {
  const items = document.querySelectorAll(".experience-ctr ul li");
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting && entry.intersectionRatio > 0.95) {
          entry.target.classList.add("experience-centered");
        } else {
          entry.target.classList.remove("experience-centered");
        }
      });
    },
    {
      threshold: [0.95],
      root: null,
      rootMargin: "-30% 0px -30% 0px",
    }
  );
  items.forEach((item) => observer.observe(item));
});
