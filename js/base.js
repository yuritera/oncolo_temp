window.onload = function () {
  const menuView = document.getElementById('spWrap');
  const spToggle = document.getElementById('spToggle');
  const spClose = document.getElementById('spClose');
  spToggle.onclick = navToggle;
  menuView.onclick = spWrapClose;
  spClose.onclick = spWrapClose;
  function navToggle() {
    let menuViewClass = menuView.getAttribute('class');
    if (menuViewClass == 'spwrap spmenuopen') {
      menuView.classList.remove('spmenuopen');
    } else {
      menuView.classList.add('spmenuopen');
    }
    event.stopPropagation();
  }
  function spWrapClose() {
    let menuViewClass = menuView.getAttribute('class');
    if (menuViewClass == 'spwrap spmenuopen') {
      menuView.classList.remove('spmenuopen');
    } else {
      ;
    }
  }
  jQuery(function ($) {
    $('#gnavi_sp > li > a').on('click', function () {
      if ($(this).hasClass('active')) {
        $(this).removeClass('active');
      } else {
        $('#gnavi_sp > li > a').removeClass('active');
        $(this).addClass('active');
      }
      return false;
    });
  });


  (function (win) {
    var timer = null, polyfill;
    polyfill = function (callback) {
      clearTimeout(timer);
      setTimeout(callback, 1000 / 60);
    };
    win.requestAnimationFrame = win.requestAnimationFrame
      || win.mozRequestAnimationFrame
      || win.webkitRequestAnimationFrame
      || polyfill;
  }(window));

  const target = document.getElementById('pc_fix'),
    height = 159;
  lastPosition = 0,
    ticking = false;

  function onScroll(lastPosition, lastWidth) {
    if (lastWidth < 850) {
      return;
    } else {
      if (lastPosition > height) {
        target.classList.add('is_fixed');
      } else {
        target.classList.remove('is_fixed');
      }
    }
  }
  window.addEventListener('scroll', function (e) {
    lastPosition = window.scrollY;
    lastWidth = window.innerWidth;
    if (!ticking) {
      window.requestAnimationFrame(function () {
        onScroll(lastPosition, lastWidth);
        ticking = false;
      });
      ticking = true;
    }
  });
}
