/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */

/* eslint-disable no-console */
/**
 * ResponsiveNavigation - Class to handle responsive navigation and burger menu functionality
 */
class ResponsiveNavigation {
  constructor(options = {}) {
    // Default options
    this.options = {
      navSelector: '.adi26r-mnav',
      burgerContainerSelector: '.adi26r-mnav-button',
      burgerSelector: '.burger',
      dropdownLinkSelector: '.links > ul > li > a',
      mobileBreakpoint: 992,
      ...options
    };
    
    // Store DOM elements from BurgerToggle
    this.burgerContainer = document.querySelector(this.options.burgerContainerSelector);
    this.burger = document.querySelector(this.options.burgerSelector);
    this.nav = document.querySelector(this.options.navSelector);
    
    // Store dropdown links
    this.dropdownLinks = document.querySelectorAll(this.options.dropdownLinkSelector);
    
    // Bind methods
    this.handleResize = this.handleResize.bind(this);
    
    // Initialize
    this.setInitialNavState();
    window.addEventListener('resize', this.handleResize);
    this.init();
  }
  
  /**
   * Set initial navigation state based on viewport width
   */
  setInitialNavState() {
    if (window.innerWidth < this.options.mobileBreakpoint) {
      this.navClose();
    } else {
      this.navOpen();
    }
  }
  
  /**
   * Handle window resize events
   */
  handleResize() {
    // Update the nav state when the viewport is resized
    this.setInitialNavState();
    
    // Reset mobile dropdowns when resizing to desktop
    if (window.innerWidth >= this.options.mobileBreakpoint) {
      const activeDropdowns = document.querySelectorAll(`${this.options.dropdownLinkSelector} + ul.active`);
      activeDropdowns.forEach(dropdown => dropdown.classList.remove('active'));
    }
  }
  
  /**
   * Initialize all event listeners
   */
  init() {
    if (!this.nav || !this.burgerContainer || !this.burger) {
      console.error('Required navigation elements not found.');
      return;
    }
    
    // Setup burger menu click event
    this.burgerContainer.addEventListener('click', (e) => {
      e.preventDefault();
      this.burger.classList.toggle('open');
      
      if (!this.burger.classList.contains('open')) {
        this.nav.classList.add('close');
        this.burger.setAttribute('aria-expanded', 'false');
      } else {
        this.nav.classList.remove('close');
        this.burger.setAttribute('aria-expanded', 'true');
      }
    });
    
    // Setup dropdown functionality
    this.setupDropdownLinks();
  }
  
  /**
   * Set up dropdown links click handlers for mobile view
   */
  setupDropdownLinks() {
    this.dropdownLinks.forEach(link => {
      const hasDropdown = link.nextElementSibling && link.nextElementSibling.tagName === 'UL';
      
      if (hasDropdown) {
        link.addEventListener('click', (e) => {
          if (window.innerWidth < this.options.mobileBreakpoint) {
            e.preventDefault();
            const dropdown = link.nextElementSibling;
            
            // Close all other open dropdowns
            this.closeOtherDropdowns(dropdown);
            
            // Toggle current dropdown
            dropdown.classList.toggle('active');
          }
        });
      }
    });
  }
  
  /**
   * Close other open dropdowns when opening a new one
   * @param {HTMLElement} currentDropdown - The dropdown that should remain open
   */
  closeOtherDropdowns(currentDropdown) {
    const allDropdowns = document.querySelectorAll(`${this.options.dropdownLinkSelector} + ul.active`);
    allDropdowns.forEach(dropdown => {
      if (dropdown !== currentDropdown) {
        dropdown.classList.remove('active');
      }
    });
  }
  
  /**
   * Open the navigation menu
   */
  navOpen() {
    this.nav.classList.remove('close');
    this.burger.classList.remove('open');
    this.burger.setAttribute('aria-expanded', 'true');
  }
  
  /**
   * Close the navigation menu
   */
  navClose() {
    this.nav.classList.add('close');
    this.burger.classList.remove('open');
    this.burger.setAttribute('aria-expanded', 'false');
  }
}

// Initialize navigation
document.addEventListener('DOMContentLoaded', () => {
  new ResponsiveNavigation();
});
/* eslint-enable no-console */
