import axios from 'axios';

const defaultConfig = axios.defaults;
const baseUrl: string = process.env.MIX_BASE_URL!;

defaultConfig.baseURL = baseUrl;
defaultConfig.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const http = axios.create(defaultConfig);

export { http, baseUrl }
