class LiveSearch {
  constructor() {
    this.openButton = document.querySelector('.open');
    this.closeButton = document.querySelector('.search-overlay__close');
    this.searchOverlay = document.querySelector('.search-overlay');

    this.event();
  }

  event() {
    this.openButton.addEventListener('click', this.openOverlay);
    this.closeButton.addEventListener('click', this.closeOverlay);
  }

  openOverlay = () => {
    this.searchOverlay.classList.add('search-overlay--active');
  };

  closeOverlay = () => {
    this.searchOverlay.classList.remove('search-overlay--active');
  };
}

export default LiveSearch;
