import React, { useState } from 'react';

const Input = () => {
  const [term, setTerm] = useState('');

  return (
    <input
      type="text"
      className="search-term"
      placeholder="What are you looking for?"
      id="search-term"
      value={term}
      onChange={e => setTerm(e.target.value)}
    />
  );
};

export default Input;
