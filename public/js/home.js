window.addEventListener('load', function() {

  // carousel slider ----------------------------------------------------------------------------------------------
  var slides = document.querySelectorAll('#img-slider .img-slide');
  var currentSlide = 0;
  var slideInterval = setInterval(nextSlide,3000);
  var dots = document.querySelectorAll('.dot');

  var prevButton = document.querySelector('.img-slider-prev');
  var nextButton = document.querySelector('.img-slider-next');

  function nextSlide() {
    goToSlide(currentSlide + 1);
  }
  function previousSlide() {
    goToSlide(currentSlide - 1);
  }
  function goToSlide(n) {
    slides[currentSlide].className = 'img-slide';
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].className = 'img-slide showing';
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    dots[currentSlide].className += " active";
  }

  // pausar slider
  var playing = true;
  var imgSlider = document.querySelector('.img-slider');

  function pauseSlideshow() {
    playing = false;
    clearInterval(slideInterval);
  }
  function playSlideshow() {
    playing = true;
    slideInterval = setInterval(nextSlide,3000);
  }
  imgSlider.addEventListener('mouseover', function() {
    if (playing === true) {
      pauseSlideshow();
    } else {
      playSlideshow();
    }
  });

  //botones siguiente y previo
  nextButton.addEventListener('click', function() {
    pauseSlideshow();
    nextSlide();
  });
  prevButton.addEventListener('click', function() {
    pauseSlideshow();
    previousSlide();
  });

  // product Carousel ----------------------------------------------------------------------------------------------
  $('.carousel[data-type="multi"] .item').each(function(){
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i = 0 ; i < 2 ; i ++) {
      next = next.next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().appendTo($(this));
    }
  });

  // vacation modal ----------------------------------------------------------------------------------------------
  /*var modal = document.querySelector('#Modal');
  var span = document.querySelector('.vacation-close');
  span.addEventListener('click', function() {
    modal.style.display = 'none';
  });
  window.addEventListener('click', function(event) {
    if (event.target == modal) {
      modal.style.display = 'none';
    };
  });*/


});
