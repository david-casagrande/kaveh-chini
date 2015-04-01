(function() {

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
