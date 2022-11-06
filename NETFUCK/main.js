var settingsmenu = document.querySelector('.setting-menu');

function settingsMenuToggle(){
    settingsmenu.classList.toggle('setting-menu-height');
}

var swiper = new Swiper(".home", {
  spaceBetween: 30,
  centeredSlides: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },

});
