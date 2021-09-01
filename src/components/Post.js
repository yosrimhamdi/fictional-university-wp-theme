import React from 'react';

const Post = ({ post }) => (
  <li>
    <a href={post.link} target="_blank" rel="noreferrer">
      {post.title.rendered}
    </a>
    {post.authorName ? <span> by {post.authorName}</span> : ''}
  </li>
);

export default Post;
