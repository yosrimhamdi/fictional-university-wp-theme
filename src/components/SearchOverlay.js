import React, { useState, useRef, useEffect } from 'react';
import classnames from 'classnames';

import SearchResults from './SearchResults';

const SearchOverlay = () => {
  const [active, setActive] = useState(false);
  const [term, setTerm] = useState('');
  const closeButton = useRef();
  const input = useRef();

  useEffect(() => {
    document.querySelector('.open').onclick = () => {
      setActive(true);
      setTimeout(() => input.current.focus(), 300);
    };
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
            ref={input}
          />
          <i
            className="fa fa-window-close search-overlay__close"
            aria-hidden="true"
            ref={closeButton}
            onClick={() => setActive(false)}
          ></i>
        </div>
      </div>
      <div className="container">
        <SearchResults overLayActive={active} term={term} setTerm={setTerm} />
      </div>
    </div>
  );
};

export default SearchOverlay;
