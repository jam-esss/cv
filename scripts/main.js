const latestJob = document.querySelector("#exp-jobt"); //Find the latest job title.
const latestComp = document.querySelector("#exp-compn"); //Find the latest company name.

//Replace job title placeholder with most recent job title.
let jobt = document.getElementById("jobtitle").innerHTML;
let jobtreplace = jobt.replace(/title/g, latestJob.textContent);
document.getElementById("jobtitle").innerHTML = jobtreplace;

//Replace company placeholder with most recent company.
let compn = document.getElementById("compname").innerHTML;
let comptreplace = compn.replace(/company/g, latestComp.textContent);
document.getElementById("compname").innerHTML = comptreplace;
