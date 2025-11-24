// Updates the job title and company name on home page.
document.addEventListener("DOMContentLoaded", function () {
  if (!document.getElementById("jobtitle") || !document.getElementById("compname")) return;

  fetch("../experience-nl/index.html")
    .then((response) => response.text())
    .then((html) => {
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, "text/html");
      const firstJob = doc.querySelector(".timeline-scroll .timeline-item");
      if (firstJob) {
        const jobTitle =
          (firstJob.dataset && firstJob.dataset.title && firstJob.dataset.title.trim()) || "";
        const companyName =
          (firstJob.dataset && firstJob.dataset.company && firstJob.dataset.company.trim()) || "";
        document.getElementById("jobtitle").textContent = jobTitle;
        document.getElementById("compname").textContent = companyName;
      }
    })
    .catch(() => {
      console.error("Failed to fetch or parse experience/index.html");
    });
});
