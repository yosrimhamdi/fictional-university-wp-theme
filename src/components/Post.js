import React from 'react';

const Post = ({ post }) => (
  <li>
    <a href={post.link} target="_blank">
      {post.title.rendered}
    </a>
  </li>
);

export default Post;
