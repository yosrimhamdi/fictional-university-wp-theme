import React, { useEffect, useState } from 'react';

import fictionalUniversity from '../apis/fictionalUniversity';

const SearchResults = ({ term, setTerm }) => {
  const [results, setResults] = useState([]);
  useEffect(() => {
    if (term) {
      const timerId = setTimeout(async () => {
        const response = await fictionalUniversity.get('/posts');

        setResults(response.data);
        setTerm('');
      }, 500);

      return () => clearTimeout(timerId);
    }
  }, [term]);

  console.log(results);

  if (term) {
    return <div className="spinner-loader" />;
  }

  return null;
};

export default SearchResults;
