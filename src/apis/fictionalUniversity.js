import axios from 'axios';

export default axios.create({
  baseURL: 'http://localhost:10004/wp-json/wp/v2',
});
