import React, { useEffect, useState } from 'react';

import PostTypeResult from './PostTypeResult';
import fictionalUniversity from '../apis/fictionalUniversity';
import postTypes from './postTypes';

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

    const timerId = setTimeout(fetchPosts, 500);

    return () => clearTimeout(timerId);
  }, [term]);

  if (term) {
    return <div className="spinner-loader" />;
  }

  const postTypeResults = Object.entries(results).map(
    ([postType, posts], i) => (
      <PostTypeResult postType={postType} posts={posts} key={i} />
    ),
  );

  return <div>{postTypeResults}</div>;
};

export default SearchResults;
