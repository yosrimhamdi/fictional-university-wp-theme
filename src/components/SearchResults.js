import React from 'react';

import PostTypeResult from './PostTypeResult';
import useFetchResults from './useFetchResults';

const SearchResults = ({ term, setTerm }) => {
  const results = useFetchResults(term, setTerm);

  if (term) {
    return <div className="spinner-loader" />;
  }

  console.log(results);
  console.log(Object.entries(results));

  const postTypeResults = Object.entries(results).map(
    ([postType, posts], i) => (
      <PostTypeResult postType={postType} posts={posts} key={i} />
    ),
  );

  return <div>{postTypeResults}</div>;
};

export default SearchResults;
