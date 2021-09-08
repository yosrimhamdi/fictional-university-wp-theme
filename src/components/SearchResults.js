import React, { useEffect, useState } from 'react';

import fictionalUniversity from '../apis/fictionalUniversity';
import SearchResult from './SearchResult';

const SearchResults = ({ term, setTerm }) => {
  const [results, setResults] = useState(null);

  useEffect(() => {
    const fetchPosts = async () => {
      if (!term) {
        return;
      }

      const response = await fictionalUniversity.get('/search', {
        params: { term },
      });

      setResults(response.data);
      setTerm('');
    };

    const timerId = setTimeout(fetchPosts, 500);

    return () => clearTimeout(timerId);
  }, [term]);

  if (term) {
    return <div className="spinner-loader" />;
  }

  if (!results) {
    return null;
  }

  const {
    pages,
    posts,
    professors,
    programs,
    events,
    campuss: campuses,
  } = results;

  return (
    <div className="row">
      <div className="one-third">
        <SearchResult title="Pages" posts={pages} />
        <SearchResult title="Posts" posts={posts} />
      </div>
      <div className="one-third">
        <SearchResult title="Professors" posts={professors} />
        <SearchResult title="Programs" posts={programs} />
      </div>
      <div className="one-third">
        <SearchResult title="Events" posts={events} />
        <SearchResult title="campuses" posts={campuses} />
      </div>
    </div>
  );
};

export default SearchResults;
