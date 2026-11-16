/**
 * Shrinks the sticky header once the page is scrolled.
 * Adds .is-compact to the header; the CSS (desktop only) does the rest.
 */
(function () {
  var header = document.querySelector('.cpc-header');
  if (!header) {
    return;
  }

  // Two thresholds, so the header doesn't flicker when scrolling stops near one.
  var COMPACT_AFTER = 60;
  var EXPAND_BEFORE = 20;
  var compact = false;

  function update() {
    var y = window.scrollY;

    if (!compact && y > COMPACT_AFTER) {
      compact = true;
      header.classList.add('is-compact');
    } else if (compact && y < EXPAND_BEFORE) {
      compact = false;
      header.classList.remove('is-compact');
    }
  }

  window.addEventListener('scroll', update, { passive: true });
  update(); // in case the page loads already scrolled
})();
