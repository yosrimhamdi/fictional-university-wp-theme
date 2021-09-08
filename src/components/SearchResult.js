import React from 'react';

import Post from './Post';

const SearchResult = ({ title, posts }) => {
  if (!posts.length) {
    return null;
  }

  const renderedPosts = posts.map(post => <Post key={post.id} post={post} />);

  return (
    <>
      <div className="search-overlay__section-title">{title}</div>
      <ul className="link-list min-list">{renderedPosts}</ul>
    </>
  );
};
export default SearchResult;
