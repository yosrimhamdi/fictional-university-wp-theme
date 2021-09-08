import React, { useState, useEffect } from 'react';
import classnames from 'classnames';

import SearchResults from './SearchResults';

const SearchOverlay = () => {
  const [active, setActive] = useState(true);
  const [term, setTerm] = useState('lorem');

  useEffect(() => {
    document.querySelector('.open .fa-search').onclick = () => setActive(true);
    document.querySelector('.js-search-trigger .fa-search').onclick = () =>
      setActive(true);
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
          <input
            type="text"
            className="search-term"
            placeholder="What are you looking for?"
            id="search-term"
            value={term}
            onChange={e => setTerm(e.target.value)}
          />
          <i
            className="fa fa-window-close search-overlay__close"
            aria-hidden="true"
            onClick={() => setActive(false)}
          ></i>
        </div>
      </div>
      <div className="container">
        <SearchResults term={term} setTerm={setTerm} />
      </div>
    </div>
  );
};

export default SearchOverlay;
