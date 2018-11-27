window.onload = function () {
  const menuView = document.getElementById('spWrap');
  const spToggle = document.getElementById('spToggle');
  spToggle.onclick = navToggle;
  menuView.onclick = spWrapClose;
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
}
