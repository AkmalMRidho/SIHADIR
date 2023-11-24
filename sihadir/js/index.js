document.addEventListener("DOMContentLoaded", function () {
  const dropDown = document.querySelector("#dropdown");
  const iconDropdown = document.querySelector("#icon-dropdown");
  const panel = document.querySelector("#panel");
  const hamburger = document.querySelector("#hamburger");
  const sidebar = document.querySelector(".body");

  dropDown.addEventListener("click", function () {
    if (!iconDropdown.classList.contains("rotate-icon")) {
      panel.style.visibility = "visible";
      iconDropdown.classList.add("rotate-icon");
    } else {
      panel.style.visibility = "hidden";
      iconDropdown.classList.remove("rotate-icon");
    }
  });

  hamburger.addEventListener("click", function () {
    if (!sidebar.classList.contains("show-sidebar")) {
      sidebar.classList.add("show-sidebar");
    } else {
      sidebar.classList.remove("show-sidebar");
    }
  });
});
