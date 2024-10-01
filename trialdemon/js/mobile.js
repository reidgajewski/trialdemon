const mobileMenu = document.getElementById("mobile-menu");
const mobileOpen = document.getElementById("mobile-open");
const mobileClose = document.getElementById("mobile-close");

mobileOpen.addEventListener('click', () => {
  mobileOpen.style.display = "none";
  mobileMenu.style.display = "block";
  mobileClose.style.display = "block";
})

mobileClose.addEventListener('click', () => {
  mobileClose.style.display = "none";
  mobileMenu.style.display = "none";
  mobileOpen.style.display = "block";
})
