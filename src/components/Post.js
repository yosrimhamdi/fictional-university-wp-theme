import React from 'react';

const Post = ({ post }) => {
  const { title, url, postType, authorName } = post;

  if (postType == 'post') {
    return (
      <li>
        <a href={url}>{title}</a> by {authorName}
      </li>
    );
  }

  return (
    <li>
      <a href={url}>{title}</a>
    </li>
  );
};
export default Post;
