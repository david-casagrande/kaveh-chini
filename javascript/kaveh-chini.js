(function() {
  'use strict';

  //mobile nav toggle
  (function mobileNav() {
    var navToggle = document.querySelector('.nav-toggle');

    navToggle.addEventListener('click', function(e) {
      e.preventDefault();
      this.classList.toggle('active');
      toggleMainNav();
    });

    function toggleMainNav() {
      var mainNav = document.querySelector('.main-nav-table-cell');
      mainNav.classList.toggle('display-block');
    }
  })();

  //portfolio items filter
  (function protfolioItemsFilter() {
    var portfolioItems = document.querySelector('.portfolio-items');

    //dont attach if not a portfolio page
    if(!portfolioItems) { return; }

    //init Isotope
    var iso = new Isotope(portfolioItems, { itemSelector: 'li' });

    //handle initial state after images have loaded
    imagesLoaded(portfolioItems, function() {
      document.querySelector('.portfolio').classList.add('loaded');
      var filter = parseFilterUrl(document.location.href);
      updateFilter(filter);
    });

    //handle browser back/forward nav
    window.onpopstate = function() {
      var filter = parseFilterUrl(document.location.href);
      updateFilter(filter);
    };

    //handle logo click
    var logo = document.querySelector('.logo a');
    logo.addEventListener('click', function(e) {
      e.preventDefault();
      updateFilter('home');
      filterReplaceState(this);
    });

    //handle main-nav click
    var mainNavFilters = document.querySelectorAll('.main-nav a');
    var allFilters = [];
    Array.prototype.filter.call(mainNavFilters, function(filter) {
      var parentClassList = filter.parentElement.classList;
      if(!parentClassList.contains('filter')) { return; }

      var href = filter.getAttribute('href');
      var filterName = parseFilterUrl(href);
      allFilters.push(filterName);

      filter.addEventListener('click', function(e) {
        e.preventDefault();
        updateFilter(filterName);
        filterReplaceState(this);
      });
    });

    function parseFilterUrl(href) {
      var url = href.split('/'),
          lastItem = url.pop();

      if(!lastItem) {
        lastItem = url.pop();
      }

      return lastItem;
    }

    function updateFilter(filter) {
      var filterName;

      if(allFilters.indexOf(filter) < 0) {
        filterName = '*';
      } else {
        filterName = '.' + filter;
      }

      iso.arrange({ filter: filterName });
      updateActiveState(filter);
    }

    function updateActiveState(filter) {
      var navItems = document.querySelectorAll('.main-nav li');
      var activeClass = 'current-menu-item';

      Array.prototype.filter.call(navItems, function(item) {
        var itemClassList = item.classList;
        itemClassList.remove(activeClass);

        if(itemClassList.contains(filter+'-nav')) {
          itemClassList.add(activeClass);
        }
      });
    }

    function filterReplaceState(href) {
      history.pushState(null, null, href);
    }
  })();

  // var router = new RouteRecognizer();
  //
  // router.add([
  //   { path: '/portfolio/:category', handler: function(category) { console.log(category); } },
  // ]);

  // mainNavFilters.addEventListener('click', function(e) {
  //   e.preventDefault();
  //   console.log(e);
  // });

  // var iso = new Isotope( '#container', {
  //   // options
  // });
  // $container.isotope({
  //   // options
  //   itemSelector: '.item',
  //   layoutMode: 'fitRows'
  // });

  // var Modal = {
  //
  //   create: function(child) {
  //     this._bindNavigation();
  //     var modal = this._createModal();
  //     modal.appendChild(child);
  //     return document.body.appendChild(modal);
  //   },
  //
  //   _createModal: function() {
  //     var modal = document.createElement('div'),
  //         closeButton = this._createCloseButton(),
  //         self = this;
  //
  //     modal.className = 'modal';
  //     modal.setAttribute('role', 'dialog');
  //     modal.setAttribute('tabindex', '1');
  //     modal.onclick = function(e) {
  //       if(e.target === this) { self._destroyModal(this); }
  //     }
  //     closeButton.onclick = function(e) {
  //       e.preventDefault();
  //       self._destroyModal(modal);
  //     }
  //     modal.appendChild(closeButton);
  //     //setTimeout(function() {
  //       modal.className = modal.className + ' open';
  //     //});
  //
  //     document.body.style.overflow = 'hidden';
  //     return modal;
  //   },
  //
  //   _createCloseButton: function() {
  //     var closeButton = document.createElement('a');
  //     closeButton.href = '#';
  //     closeButton.title = 'Close Modal';
  //     closeButton.className = 'close-modal';
  //     closeButton.appendChild(document.createTextNode('×'));
  //     return closeButton;
  //   },
  //
  //   _destroyModal: function(modal) {
  //     if(!modal) { return; }
  //     document.body.removeChild(modal);
  //     document.body.style.overflow = null;
  //     this._unbindNavigation();
  //   },
  //
  //   _bindNavigation: function() {
  //     var self = this;
  //     window.addEventListener('keyup', this._navigate);
  //   },
  //
  //   _unbindNavigation: function() {
  //     window.removeEventListener('keyup', this._navigate);
  //   },
  //
  //   _navigate: function(e) {
  //     e.preventDefault();
  //     var key = e.keyCode;
  //
  //     var gallery = document.getElementsByClassName('image-gallery')[0],
  //         images = gallery.getElementsByClassName('image'),
  //         modal = document.getElementsByClassName('modal')[0],
  //         currentImage = modal.getElementsByTagName('img')[0];
  //
  //
  //     function imageIterator(callback) {
  //       for(var x = 0; x < images.length; x++) {
  //         var href = images[x].childNodes[0].href;
  //         if(href === currentImage.getAttribute('src')) {
  //           return callback(x);
  //         }
  //       }
  //     }
  //
  //     if(key === 37) { //left
  //       imageIterator(function(index) {
  //         var idx = index - 1;
  //         if(idx < 0) { return; }
  //         var src = images[idx].childNodes[0].href;
  //         return currentImage.setAttribute('src', src);
  //       });
  //     } else if(key === 39) { //right
  //       imageIterator(function(index) {
  //         var idx = index + 1;
  //         if(idx >= images.length) { return; }
  //         var src = images[idx].childNodes[0].href;
  //         return currentImage.setAttribute('src', src);
  //       });
  //     } else if(key === 27) {
  //       Modal._unbindNavigation(document.getElementsByClassName('modal')[0]);
  //     }
  //   }
  //
  // };
  //
  // function galleryClick(e) {
  //   e.preventDefault();
  //   var imgSrc = e.target.parentNode.getAttribute('href'), galleryMainImage;
  //   galleryMainImage = e.target.offsetParent.getElementsByClassName('gallery-main-image')[0];
  //   if(galleryMainImage.getAttribute('src') === imgSrc) { return; }
  //   galleryMainImage.setAttribute('src', imgSrc);
  // }
  //
  // function imageGalleryClick(e) {
  //   e.preventDefault();
  //   var imgSrc = e.target.parentNode.getAttribute('href');
  //   var img = new Image();
  //   img.src = imgSrc;
  //   var modal = Modal.create(img);
  //   modal.focus();
  // }
  //
  // function galleryNavigate(idx) {
  //
  //   var gallery = document.getElementsByClassName('image-gallery')[0],
  //       galleryWidth = gallery.clientWidth;
  //
  //   if(idx) {
  //     galleryWidth = -galleryWidth;
  //   }
  //
  //   gallery.leftScroll = gallery.scrollLeft += galleryWidth;
  //   //scrollTo(gallery, galleryWidth, 400);
  // }
  //
  // function scrollTo(element, difference, duration, end) {
  //   var nextPosition = element.scrollLeft + difference,
  //       perTick = (difference / duration) * 10;
  //
  //   end = end || nextPosition;
  //   setTimeout(function() {
  //     element.scrollLeft = element.scrollLeft + perTick;
  //     if (element.scrollLeft === end) return;
  //     //scrollTo(element, to, duration - 10);
  //   }, 10);
  //
  //   // var to = element.scrollLeft + next,
  //   //     difference = element.scrollLeft +
  //   //     perTick = difference / 300 * duration,
  //   //     to = element.scrollLeft += difference;
  //
  //   // setTimeout(function() {
  //   //   element.scrollLeft = element.scrollLeft + perTick;
  //   //   if (element.scrollLeft === to) return;
  //   //   scrollTo(element, to, duration - 10);
  //   // }, 10);
  //
  //   // if (duration < 0) return;
  //   // var difference = to - element.scrollLeft;
  //   // var perTick = difference / duration * 10;
  //   //
  //   // setTimeout(function() {
  //   //     element.scrollLeft = element.scrollLeft + perTick;
  //   //     if (element.scrollLeft === to) return;
  //   //     scrollTo(element, to, duration - 10);
  //   // }, 10);
  // }
  //
  // window.SILL_LIFE = {
  //   galleryClick: galleryClick,
  //   imageGalleryClick: imageGalleryClick,
  //   galleryNavigate: galleryNavigate
  // };

})();
