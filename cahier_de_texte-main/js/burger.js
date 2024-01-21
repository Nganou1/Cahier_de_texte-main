const menuBtn = document.querySelector('.menuBurger');
const container = document.querySelector('.container')
let menuOpen = false;

menuBtn.addEventListener('click', () => {
  if(!menuOpen) {
    menuBtn.classList.add('open');
    menuOpen = true;
    var overlay = document.getElementById('nav')
    overlay.style.left = "0%"
    container.style.display = "none"
  } else {
    menuBtn.classList.remove('open');
    menuOpen = false;
    var overlay = document.getElementById('nav')
    overlay.style.left = '-100%'
    setTimeout(()=>{
      container.style.display = "block"},200
    )
  }
});