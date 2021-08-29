import React, { useEffect, useState } from 'react';

import fictionalUniversity from '../apis/fictionalUniversity';
import PostTypeResult from './PostTypeResult';

const postTypes = ['pages', 'posts'];

const SearchResults = ({ term, setTerm }) => {
  const [results, setResults] = useState({});

  useEffect(() => {
    if (term) {
      const timerId = setTimeout(async () => {
        const promises = postTypes.map(postType => {
          return fictionalUniversity.get('/' + postType, {
            params: {
              search: term,
            },
          });
        });

        const results = await Promise.all(promises);

        const state = {};

        results.forEach((result, i) => {
          state[postTypes[i]] = result.data;
        });

        setResults(state);
        setTerm('');
      }, 1000);

      return () => clearTimeout(timerId);
    }
  }, [term]);

  if (term) {
    return <div className="spinner-loader" />;
  }

  const postTypeResults = Object.entries(results).map(a => {
    const [postType, posts] = a;
    return <PostTypeResult postType={postType} posts={posts} />;
  });

  return <div>{postTypeResults}</div>;
};

export default SearchResults;
