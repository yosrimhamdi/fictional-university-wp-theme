import React from 'react';

const Post = ({ post }) => (
  <li>
    <a href={post.url}>{post.title}</a>
  </li>
);
export default Post;
