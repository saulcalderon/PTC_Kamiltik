document.addEventListener('DOMContentLoaded', function() {
    M.AutoInit();
    
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems,{
        indicators:false,
        height:500
    });

});


var swiper = new Swiper('.swiper-container.proyectos', {
    autoheight:true,
    spaceBetween: 0,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation:{
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev'
    },
    breakpoints: {
      320:{
        slidesPerView:1
      },
      425:{
        slidesPerView:2
      },
      1024: {
        slidesPerView: 3,
      },
    }
  });