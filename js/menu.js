var m = 0;
var sidebar = document.getElementById("sidebar");
var sidebar_overlay = document.getElementById("sidebar-overlay");
var menuB = document.getElementById("menu-button");
function menu() {
  if (m == 0) {
    document.body.style.overflow = "hidden";
    menuB.classList.add("menu-button-o");
    sidebar.style.left = "0";
    sidebar_overlay.style.display = "block";
    setTimeout(function() {
      sidebar_overlay.style.opacity = "1";
    }, 10);
    m = 1;
  } else {
    document.body.style.overflow = "";
    menuB.classList.remove("menu-button-o");
    sidebar.style.left = "-100%";
    sidebar_overlay.style.opacity = "0";
    m = 0;
    setTimeout(function() {
      if (m == 0) {
        sidebar_overlay.style.display = "none";
      }
    }, 500);
  }
}
