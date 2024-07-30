document.addEventListener("DOMContentLoaded", function () {
    const burger = document.querySelector(".burger");
    const navMenu = document.querySelector(".main-nav");
    const navLinks = document.querySelectorAll(".main-nav a");
  
    // Écouteur d'événement pour le clic sur le hamburger
    burger.addEventListener("click", function () {
      // Ajoute ou supprime la classe "active" sur l'icône du hamburger
      burger.classList.toggle("active");
      // Ajoute ou supprime la classe "active" sur le menu de navigation
      navMenu.classList.toggle("active");
    });
  
    // Parcourir tous les liens du menu de navigation
    navLinks.forEach(function (link) {
      // Ajoute un écouteur d'événement pour le clic sur chaque lien
      link.addEventListener("click", function () {
        // Supprime la classe "active" de l'icône du hamburger et du menu de navigation
        burger.classList.remove("active");
        navMenu.classList.remove("active");
      });
    });
  });