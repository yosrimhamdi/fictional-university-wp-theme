import React from 'react';

const Post = ({ post }) => {
  const { title, url, postType, authorName, imageUrl } = post;

  if (postType == 'post') {
    return (
      <li>
        <a href={url}>{title}</a> by {authorName}
      </li>
    );
  }

  if (postType == 'program' || postType == 'campuses') {
    return (
      <li>
        <a href={url}>{title}</a>
      </li>
    );
  }

  if (postType == 'professor') {
    return (
      <li className="professor-card__list-item">
        <a className="professor-card" href={url}>
          <img className="professor-card__image" src={imageUrl} />
          <span className="professor-card__name">{title}</span>
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
