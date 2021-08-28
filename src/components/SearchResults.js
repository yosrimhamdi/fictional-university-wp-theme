import React, { useEffect } from 'react';

const SearchResults = ({ term }) => {
  useEffect(() => {
    const timerId = setTimeout(() => {
      // request here
    }, 500);

    return () => clearTimeout(timerId);
  }, [term]);

  return <div>Search Results</div>;
};

export default SearchResults;
