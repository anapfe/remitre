window.addEventListener('load', function() {

  // search toggle ----------------------------------------------------------------------------------------------
  var search = document.querySelector('.search-block');
  var searchBtn = document.querySelector('.search-btn');
  searchBtn.addEventListener('click', function() {
    if (search.style.bottom === '2px') {
      search.style.bottom = '-68px';
    } else {
      search.style.bottom = '2px';
    }
  });

  // current page menu ----------------------------------------------------------------------------------------------
  try {
    var currentUrl = window.location.href;
    var menuItem1 = document.querySelectorAll(".menu-item1");
    if (currentUrl.includes("productos")) {
      menuItem1[1].classList.add('urlcolor');
    }
    menuItem1.forEach(function(element) {
      var menuUrl = element.href;
      if (currentUrl === menuUrl) {
        element.classList.add('urlcolor');
      };
    });
  } catch(error) {
    console.log('error en menu');
  };

  // hamnbuerguer mobile ----------------------------------------------------------------------------------------------
  var menuDropdown = document.querySelector('.main-navigation');
  menuDropdown.addEventListener('click', function() {
    this.classList.toggle("toggled");
  });

  var menuCategories = document.querySelector('.menu-item');
    menuCategories.forEach(function(element) {
      element.addEventListener('click', function() {
        var liParent = element.parent;
        var submenu = liParent.children[1];
        submenu.classList.toggle('show');
      });
    });

});
