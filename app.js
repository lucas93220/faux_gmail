// Rendre le bouton visible lorsque l'utilisateur fait défiler la page
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// Fonction pour remonter en haut de la page
function topFunction() {
  document.body.scrollTop = 0; // Pour Safari
  document.documentElement.scrollTop = 0; // Pour Chrome, Firefox, IE et Opera
}

// Fonction pour redescendre tout en bas de la page
function bottomFunction() {
  document.body.scrollTop = document.body.scrollHeight; // Pour Safari
  document.documentElement.scrollTop = document.documentElement.scrollHeight; // Pour Chrome, Firefox, IE et Opera
}