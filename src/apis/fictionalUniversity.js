import axios from 'axios';

export default axios.create({
  baseURL: UniversityData.root_url + '/wp-json/wp/v2',
});
