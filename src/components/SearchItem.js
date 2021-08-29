import React from 'react';

const SearchItem = ({ result }) => (
  <li>
    <a href={result.link} target="_blank">
      {result.title.rendered}
    </a>
  </li>
);

export default SearchItem;
