import baseAxios from "axios";

const axios = baseAxios.create({
  baseURL: process.env.NODE_ENV === 'development' ? 'http://localhost:8000/api' : '/api',
  // headers: {‘Some-Auth-Header’: ‘token’}
});

export default axios;
