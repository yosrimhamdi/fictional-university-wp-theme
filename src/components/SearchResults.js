import React, { useEffect, useState } from 'react';

import PostTypeResult from './PostTypeResult';
import fictionalUniversity from '../apis/fictionalUniversity';
import postTypes from './postTypes';

const SearchResults = ({ term, setTerm }) => {
  const [results, setResults] = useState({});

  useEffect(() => {
    const fetchPosts = () => {
      if (!term) {
        return;
      }

      postTypes.forEach(async postType => {
        const response = await fictionalUniversity.get('/' + postType, {
          params: {
            search: term,
          },
        });

        setResults(prevResults => {
          return { ...prevResults, [postType]: response.data };
        });
      });

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
