import axios from 'axios';

export default axios.create({
  baseURL: 'http://fictional-university.local/wp-json/wp/v2',
});
