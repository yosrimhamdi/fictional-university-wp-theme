import { useEffect } from 'react';

import fictionalUniversity from '../apis/fictionalUniversity';
import postTypes from '../postTypes';

const useFetchResults = (term, setTerm, setResults) => {
  useEffect(() => {
    const fetchPosts = async () => {
      if (!term) {
        return;
      }

      const promises = [];

      for (const postType of postTypes) {
        const promise = fictionalUniversity.get('/' + postType, {
          params: {
            search: term,
          },
        });

        promises.push(promise);
      }

      const results = await Promise.all(promises);

      const state = {};

      results.forEach((result, i) => (state[postTypes[i]] = result.data));

      setResults(state);
      setTerm('');
    };

    const timerId = setTimeout(fetchPosts, 500);

    return () => clearTimeout(timerId);
  }, [term]);
};

export default useFetchResults;
