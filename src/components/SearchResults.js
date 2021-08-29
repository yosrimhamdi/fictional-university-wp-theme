import React, { useEffect, useState } from 'react';

import fictionalUniversity from '../apis/fictionalUniversity';
import SearchItem from './SearchItem';

const SearchResults = ({ term, setTerm, overLayActive }) => {
  const [results, setResults] = useState(null);

  useEffect(() => {
    if (term) {
      const timerId = setTimeout(async () => {
        const response = await fictionalUniversity.get('/pages', {
          params: {
            search: term,
          },
        });

        setTerm('');
        setResults(response.data);
      }, 1000);

      return () => clearTimeout(timerId);
    }
  }, [term]);

  useEffect(() => {
    if (!overLayActive && results && results.length) {
      setResults(null);
    }
  }, [overLayActive]);

  if (term) {
    return <div className="spinner-loader" />;
  }

  if (results && results.length) {
    const renderedResults = results.map(result => (
      <SearchItem key={result.id} result={result} />
    ));

    return (
      <div>
        <div className="search-overlay__section-title">General Information</div>
        <ul className="link-list min-list">{renderedResults}</ul>
      </div>
    );
  }

  if (results && !results.length) {
    return <div>Ouups, sorry nothing was found!, try something else.</div>;
  }

  return null;
};

export default SearchResults;
