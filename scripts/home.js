// Updates the job title and company name on home page.
document.addEventListener("DOMContentLoaded", function () {
  if (!document.getElementById("jobtitle") || !document.getElementById("compname")) return;

  fetch("experience.html")
    .then((response) => response.text())
    .then((html) => {
      const parser = new DOMParser();
      const doc = parser.parseFromString(html, "text/html");
      const firstJob = doc.querySelector(".experience-ctr ul li .jobinfo");
      if (firstJob) {
        const jobTitle = firstJob.querySelector("h2")?.textContent?.trim() || "";
        const companyName = firstJob.querySelector("h3")?.textContent?.trim() || "";
        document.getElementById("jobtitle").textContent = jobTitle;
        document.getElementById("compname").textContent = companyName;
      }
    })
    .catch(() => {
      console.error("Failed to fetch or parse experience.html");
    });
});
