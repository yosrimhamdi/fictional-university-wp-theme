import React from 'react';

import Post from './Post';

const PostTypeResult = ({ posts, postType }) => {
  if (!posts.length) {
    return null;
  }

  const renderedPosts = posts.map(post => <Post key={post.id} post={post} />);

  return (
    <div>
      <div className="search-overlay__section-title">{postType}</div>
      <ul className="link-list min-list">{renderedPosts}</ul>
    </div>
  );
};

export default PostTypeResult;
