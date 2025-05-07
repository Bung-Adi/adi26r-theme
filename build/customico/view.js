/******/ (() => { // webpackBootstrap
/*!*******************************!*\
  !*** ./src/customico/view.js ***!
  \*******************************/
(function () {
  // Wait until DOM is fully loaded
  document.addEventListener('DOMContentLoaded', function () {
    // Find all instances of our block
    const iconLinkBlocks = document.querySelectorAll('.adi26r-customico-block');
    if (!iconLinkBlocks.length) return;
    iconLinkBlocks.forEach(block => {
      const link = block.querySelector('.icon-link-wrapper');
      const text = block.querySelector('.icon-link-text');
      if (!link || !text) return;

      // Add accessibility attributes if they don't exist
      if (text.textContent.trim() && !link.hasAttribute('aria-label')) {
        link.setAttribute('aria-label', text.textContent.trim());
      }
    });
  });
})();
/******/ })()
;
//# sourceMappingURL=view.js.map