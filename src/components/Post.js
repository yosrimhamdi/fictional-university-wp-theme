import React from 'react';

const Post = ({ post }) => {
  const { title, url, postType, author } = post;

  if (postType == 'post' || postType == 'page') {
    return (
      <li>
        <a href={url}>
          {title} by {author}
        </a>
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
