import React from 'react';

const Post = ({ post }) => {
  const { title, url, postType, author } = post;

  if (postType == 'post') {
    return (
      <li>
        <a href={url}>{title}</a> by {author}
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
