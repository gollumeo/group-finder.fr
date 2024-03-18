import axios from 'axios';

export const instance = axios.create({
    baseURL: '/api/',
    headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json',
        'timeout': 1000,
    },
});
