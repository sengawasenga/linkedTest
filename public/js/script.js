"use strict";

document
  .querySelector(".hamburger .btn-circle-sm.light")
  .addEventListener("click", () => {
    document.querySelector(".sidebar").classList.add("active");
  });

document
  .querySelector(".sidebar .btn-circle-sm")
  .addEventListener("click", () => {
    document.querySelector(".sidebar").classList.remove("active");
  });
