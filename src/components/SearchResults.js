import React, { useEffect, useState } from 'react';

import fictionalUniversity from '../apis/fictionalUniversity';
import PostTypeResult from './PostTypeResult';
import postTypes from '../postTypes';

const SearchResults = ({ term, setTerm }) => {
  const [results, setResults] = useState({});

  useEffect(() => {
    const fetchPosts = async () => {
      if (!term) {
        return;
      }

      const promises = [];

      for (const postType of postTypes) {
        const promise = fictionalUniversity.get('/' + postType, {
          params: {
            search: term,
          },
        });

        promises.push(promise);
      }

      const results = await Promise.all(promises);

      const state = {};

      results.forEach((result, i) => (state[postTypes[i]] = result.data));

      setResults(state);
      setTerm('');
    };

    const timerId = setTimeout(fetchPosts, 1000);

    return () => clearTimeout(timerId);
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
