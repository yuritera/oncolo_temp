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

  const target = document.getElementById('pc_fix');
  const target2 = document.getElementById('gotop_fix');
  height = 159;
  lastPosition = 0;
  ticking = false;

  function onScroll(lastPosition, lastWidth) {
    if (lastWidth < 850) {
      if (lastPosition > 400) {
        target2.classList.add('is_add');
      } else {
        target2.classList.remove('is_add');
      }
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

  jQuery(function ($) {
    // #で始まるアンカーをクリックした場合に処理
    jQuery("a.smooth").click(function () {
      // スクロールの速度
      var speed = 400; // ミリ秒
      // アンカーの値取得
      var href = $(this).attr("href");
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top - 120;
      // スムーススクロール
      jQuery('body,html').animate({ scrollTop: position }, speed, 'swing');
      return false;
    });
  });
}
