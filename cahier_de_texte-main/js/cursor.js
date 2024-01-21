const text = "BIENVENUE";
let index = 0;
const speed = 500; // Vitesse de saisie en millisecondes
const h1 = document.querySelector(".typing-effect")
console.log(h1)
function typeEffect() {
  if (index < text.length) {
    h1.textContent += text.charAt(index);
    index++;
    setTimeout(typeEffect, speed);
  } else {
    setTimeout(eraseEffect, speed * 2);
  }
}

function eraseEffect() {
  if (index >= 0) {
    const truncatedText = text.substring(0, index);
    h1.textContent = truncatedText;
    index--;
    setTimeout(eraseEffect, speed / 2);
  } else {
    setTimeout(typeEffect, speed);
  }
}

typeEffect();
