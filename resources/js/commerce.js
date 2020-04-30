document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems);
    
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems,{
        indicators:false,
        height:500
    });
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);

    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
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