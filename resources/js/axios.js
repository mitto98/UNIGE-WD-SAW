import baseAxios from "axios";

const tokenItem = localStorage.getItem('user_token');

const axios = baseAxios.create({
  baseURL: process.env.NODE_ENV === 'development' ? 'http://localhost:8000/' : '/',
  headers: {
    'X-Requested-With': 'XMLHttpRequest',
    'Authorization': tokenItem || undefined,
  }
});

export default axios;
