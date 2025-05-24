import axios from "axios"

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

class Search {
  // 1. describe and create/initiate our object
  constructor() {
    this.addSearchHTML()
    this.resultsDiv = document.querySelector("#search-overlay__results")
    this.openButton = document.querySelectorAll(".js-search-trigger")
    this.closeButton = document.querySelector(".search-overlay__close")
    this.searchOverlay = document.querySelector(".search-overlay")
    this.searchField = document.querySelector("#search-term")
    this.isOverlayOpen = false
    this.isSpinnerVisible = false
    this.previousValue
    this.typingTimer
    this.events()
  }

  // 2. events
  events() {
    this.openButton.forEach(el => {
      el.addEventListener("click", e => {
        e.preventDefault()
        this.openOverlay()
      })
    })

    this.closeButton.addEventListener("click", () => this.closeOverlay())
    document.addEventListener("keydown", e => this.keyPressDispatcher(e))
    this.searchField.addEventListener("keyup", () => this.typingLogic())
  }

  // 3. methods (function, action...)
  typingLogic() {
    if (this.searchField.value != this.previousValue) {
      clearTimeout(this.typingTimer)

      if (this.searchField.value) {
        if (!this.isSpinnerVisible) {
          this.resultsDiv.innerHTML = '<div class="spinner-loader"></div>'
          this.isSpinnerVisible = true
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 750)
      } else {
        this.resultsDiv.innerHTML = ""
        this.isSpinnerVisible = false
      }
    }

    this.previousValue = this.searchField.value
  }

  async getResults() {
    try {
      const response = await axios.get(
        `${adi26rData.root_url}/wp-json/adi26r/v1/search`,
        { params: { term: this.searchField.value } }
      );
      const results = response.data;
      this.resultsDiv.innerHTML = `
        <div class="row">
          <div class="one-third">
            <h2 class="search-overlay__section-title">Pages</h2>
            ${results.pages.length ? '<ul class="link-list min-list">' : "<p>No pages match that search.</p>"}
              ${results.pages.map(item => `<li><a href="${item.permalink}">${item.title}</a></li>`).join("")}
            ${results.pages.length ? "</ul>" : ""}
          </div>
          <div class="one-third">
            <h2 class="search-overlay__section-title">Posts</h2>
            ${results.post.length ? '<ul class="link-list min-list">' : `<p>No posts match that search.</p>`}
              ${results.post.map(item => `<li><a href="${item.permalink}"><img src="${item.image}"><p>${item.title}</p></a></li>`).join("")}
            ${results.post.length ? "</ul>" : ""}
          </div>
          <div class="one-third">
            <h2 class="search-overlay__section-title">AI Art Gallery</h2>
            ${results['ai-art-gallery'].length ? '<ul class="link-list min-list">' : "<p>No AI art matches that search.</p>"}
              ${results['ai-art-gallery'].map(item => `<li><a href="${item.permalink}"><img src="${item.image}"><p>${item.title}</p></a></li>`).join("")}
            ${results['ai-art-gallery'].length ? "</ul>" : ""}
          </div>
          <div class="one-third">
            <h2 class="search-overlay__section-title">Concepts</h2>
            ${results.concept.length ? '<ul class="link-list min-list">' : "<p>No concepts match that search.</p>"}
              ${results.concept.map(item => `<li><a href="${item.permalink}"><img src="${item.image}"><p>${item.title}</p></a></li>`).join("")}
            ${results.concept.length ? "</ul>" : ""}
          </div>
        </div>
      `;
      this.isSpinnerVisible = false;
    } catch (e) {
      this.resultsDiv.innerHTML = "<p class='search-error'>Something went wrong. Please try again.</p>";
      this.isSpinnerVisible = false;
      console.log(e);
    }
  }

  keyPressDispatcher(e) {
    if (e.keyCode == 83 && !this.isOverlayOpen && document.activeElement.tagName != "INPUT" && document.activeElement.tagName != "TEXTAREA") {
      this.openOverlay()
    }

    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay()
    }
  }

  openOverlay() {
    this.searchOverlay.classList.add("search-overlay--active")
    document.body.classList.add("body-no-scroll")
    this.searchField.value = ""
    setTimeout(() => this.searchField.focus(), 301)
    console.log("our open method just ran!")
    this.isOverlayOpen = true
    return false
  }

  closeOverlay() {
    this.searchOverlay.classList.remove("search-overlay--active")
    document.body.classList.remove("body-no-scroll")
    console.log("our close method just ran!")
    this.isOverlayOpen = false
  }

  addSearchHTML() {
    document.body.insertAdjacentHTML(
      "beforeend",
      `
      <div class="search-overlay">
        <div class="search-overlay__top">
          <div class="container">
            <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term">
            <button class="search-overlay__icon" aria-label="search">search</button>
          </div>
        </div>
        
        <div class="container">
          <div id="search-overlay__results"></div>
        </div>

        <div class="search-close-container">
          <button class="search-overlay__close" aria-label="close search">
            <span class="line line-a"></span>
            <span class="line line-b"></span>
          </button>
        </div>

      </div>
    `
    )
  }
}
// Ensure adi26rData is defined to avoid runtime errors
if (typeof adi26rData === "undefined") {
  window.adi26rData = {
    root_url: window.location.origin // fallback to current origin if not set by WP
  };
}

// Initialize navigation
document.addEventListener('DOMContentLoaded', () => {
  new ResponsiveNavigation();
  new Search();
});
/* eslint-enable no-console */
