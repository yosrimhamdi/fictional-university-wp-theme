import React, { useState, useRef, useEffect } from 'react';
import classnames from 'classnames';

import Input from './Input';

const SearchOverlay = () => {
  const [active, setActive] = useState(false);
  const closeButton = useRef();

  useEffect(() => {
    document.querySelector('.open').onclick = () => setActive(true);
  }, []);

  const className = classnames({
    'search-overlay': true,
    'search-overlay--active': active,
  });

  return (
    <div className={className}>
      <div className="search-overlay__top">
        <div className="container">
          <i
            className="fa fa-search search-overlay__icon"
            aria-hidden="true"
          ></i>
          <Input />
          <i
            className="fa fa-window-close search-overlay__close"
            aria-hidden="true"
            ref={closeButton}
            onClick={() => setActive(false)}
          ></i>
        </div>
      </div>
    </div>
  );
};

export default SearchOverlay;
