class LiveSearch {
  constructor() {
    this.openButton = document.querySelector('.open');
    this.closeButton = document.querySelector('.search-overlay__close');
    this.searchOverlay = document.querySelector('.search-overlay');
    this.activeClass = 'search-overlay--active';

    this.event();
  }

  event() {
    this.openButton.addEventListener('click', this.openOverlay);
    this.closeButton.addEventListener('click', this.closeOverlay);
  }

  openOverlay = () => {
    this.searchOverlay.classList.add(this.activeClass);
  };

  closeOverlay = () => {
    this.searchOverlay.classList.remove(this.activeClass);
  };
}

export default LiveSearch;
