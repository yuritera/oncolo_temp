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
}
