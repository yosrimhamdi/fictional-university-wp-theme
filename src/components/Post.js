import React from 'react';
// import moment from 'moment';
import moment from '../../node_modules/moment/dist/moment.js';

const Post = ({ post }) => {
  const {
    title,
    description,
    date: date,
    url,
    postType,
    authorName,
    imageUrl,
  } = post;

  switch (postType) {
    case 'post':
      return (
        <li>
          <a href={url}>{title}</a> by {authorName}
        </li>
      );
    case 'professor':
      return (
        <li className="professor-card__list-item">
          <a className="professor-card" href={url}>
            <img className="professor-card__image" src={imageUrl} />
            <span className="professor-card__name">{title}</span>
          </a>
        </li>
      );
    case 'event':
      return (
        <div className="event-summary">
          <a
            className="event-summary__date t-center"
            href={url}
            style={{ color: 'white' }}
          >
            <span className="event-summary__month">
              {moment(date).format('MMM')}
            </span>
            <span className="event-summary__day">
              {moment(date).format('d')}
            </span>
          </a>
          <div className="event-summary__content">
            <h5 className="event-summary__title headline headline--tiny">
              <a href={url}>{title}</a>
            </h5>
            <p>
              {description}
              <a href={url} className="nu gray">
                Read more
              </a>
            </p>
          </div>
        </div>
      );
    default:
      return (
        <li>
          <a href={url}>{title}</a>
        </li>
      );
  }
};
export default Post;
