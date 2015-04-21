(function() {
  'use strict';

  function checkCtrlClick(e) {
    return e.ctrlKey || e.metaKey;
  }

  function parseUrlSlug(href) {
    var url = href.split('/'),
        lastItem = url.pop();

    if(!lastItem || href.indexOf('?') > -1) {
      lastItem = url.pop();
    }
    return lastItem;
  }

  function parseQueryParam() {
    var search = document.location.search;
    return search ? search.split('portfolio_item=')[1] : null;
  }

  //mobile nav toggle
  (function mobileNav() {
    var navToggle = document.querySelector('.mobile-nav-toggle .nav-toggle');

    navToggle.addEventListener('click', function(e) {
      e.preventDefault();
      toggleNavToggle();
      toggleMainNav();
    });

    var mainNavFilters = document.querySelectorAll('.main-nav a');
    var allFilters = [];
    Array.prototype.filter.call(mainNavFilters, function(filter) {
      filter.addEventListener('click', function(e) {
        toggleNavToggle();
        toggleMainNav();
      });
    });

    function toggleNavToggle() {
      navToggle.classList.toggle('active');
    }

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
      var filter = parseUrlSlug(document.location.href);
      updateFilter(filter);
    });

    //handle browser back/forward nav
    window.addEventListener('popstate', function() {
      var filter = parseUrlSlug(document.location.href);
      updateFilter(filter);
    });

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
      var filterName = parseUrlSlug(href);
      allFilters.push(filterName);

      filter.addEventListener('click', function(e) {
        if(checkCtrlClick(e)) { return; }
        e.preventDefault();
        updateFilter(filterName);
        filterReplaceState(this);
      });
    });

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

  (function portfolioItemModal() {
    var portfolioItems = document.querySelectorAll('.portfolio-items li');

    //dont attach if not a portfolio page
    if(portfolioItems.length < 1) { return; }

    //handle browser back/forward nav
    window.addEventListener('popstate', function() {
      var search = parseQueryParam();
      if(search) {
        openModal(search);
      } else {
        closeModalOnHistory();
      }
    });

    //handle initial state
    (function init() {
      var search = parseQueryParam();
      if(!search) { return; }
      openModal(search);
    })();

    Array.prototype.filter.call(portfolioItems, function(item) {

      item.addEventListener('click', function(e) {
        if(checkCtrlClick(e)) { return; }
        e.preventDefault();
        var a = item.querySelector('a');
        var slug = parseUrlSlug(a.getAttribute('href'));
        openModal(slug);
        updateUrl(slug);
      });
    });

    function updateUrl(slug) {
      var pageUrl = '?portfolio_item=' + slug;
      history.pushState(null, null, pageUrl);
    }

    function openModal(slug) {
      getItem(slug, function(response) {
        var json = JSON.parse(response.responseText);
        createModal(json);
        setTimeout(function() {
          var container = document.querySelector('.modal-container');
          if(!container) { return; }
          container.classList.add('loaded');
        }, 10);
      });
    }

    function getItem(slug, callback) {
      var req = new XMLHttpRequest();
      req.onload = function() {
        callback(req);
      };
      req.open('get', '/wp-admin/admin-ajax.php?action=portfolio&slug='+slug, true);
      req.send();
    }

    function closeModalOnClick(e) {
      var target = e.target;
      if(target.classList.contains('modal') || target.classList.contains('close-modal-button')) {
        closeModal();
        history.pushState(null, null, window.location.href.split('?')[0]);
      }
    }

    function closeModalOnHistory() {
      closeModal();
    }

    function closeModal() {
      var modal = document.querySelector('.modal');
      if(!modal) { return; }

      var container = document.querySelector('.modal-container');
      container.classList.remove('loaded');

      //400ms set in css for modal
      setTimeout(function() {
        modal.removeEventListener('click', closeModalOnClick);
        modal.remove();
      }, 400);
    }

    function createModal(data) {
      var modal = document.createElement('div');
      modal.className = 'modal ' + data.portfolio.category_slug; //jshint ignore:line
      modal.setAttribute('role', 'dialog');
      modal.setAttribute('tabindex', '1');

      modal.addEventListener('click', closeModalOnClick);

      var modalContainer = createModalContainer();
      modalContainer.appendChild(createModalHeader(data));
      modalContainer.appendChild(createModalBody(data));

      modal.appendChild(modalContainer);
      return document.body.appendChild(modal);
    }

    function createModalContainer() {
      var modalContainer = document.createElement('div');
      modalContainer.className = 'modal-container';
      return modalContainer;
    }

    function createModalHeader(data) {
      var header = document.createElement('div');
      header.className = 'header display-table';

      var title = document.createElement('div');
      title.className = 'title display-table-cell';

      var closeButton = document.createElement('a');
      closeButton.className = 'close-modal-button';
      closeButton.appendChild(document.createTextNode('×'));

      var close = document.createElement('div');
      close.appendChild(closeButton);
      close.className = 'close-modal display-table-cell';

      var text = document.createTextNode(data.portfolio.title);

      title.appendChild(text);
      header.appendChild(title);
      header.appendChild(close);

      return header;
    }

    function createModalBody(data) {
      var body = document.createElement('div');
      body.className = 'body display-table';
      body.appendChild(createMedia(data));
      body.appendChild(createNarrative(data));
      return body;
    }

    function createMedia(data) {
      var media = document.createElement('div');
      media.className = 'media display-table-cell align-top';

      var images = data.portfolio.images.map(function(img) { return '<img src="'+img+'" />'; });
      var videos = data.portfolio.videos;
      var html = '';

      if(videos.length > 0) {
        html = html + videos.join('');
      }

      if(images.length > 0) {
        html = html + images.join('');
      }

      media.innerHTML = html;
      return media;
    }

    function createNarrative(data) {
      var narrative = document.createElement('div');
      narrative.className = 'narrative display-table-cell align-top';
      narrative.innerHTML = data.portfolio.narrative;
      return narrative;
    }
  })();

})();
