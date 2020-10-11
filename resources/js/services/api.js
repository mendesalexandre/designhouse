import axios from 'axios';

const apiURL = 'https://covid19-brazil-api.now.sh/api/report/v1';
const api = axios.create({
    baseURL: apiURL,
    timeout: 3000,
});

export default api;