import axios from 'axios';

export function callApiFetch(params = {}) {
    return axios.get('http://nuxtserver.test/api/users', { params });
}

export function callApiEdit(id, params) {
    return axios.put(`http://nuxtserver.test/api/user/${id}`, params)
        .then(response => response)
        .catch(error => error)
}

export function callApiDelete(id) {
    return axios.delete(`http://nuxtserver.test/api/user/${id}`)
        .then(response => response)
        .catch(error => error)
}

export function callApiShow(id) {
    return axios.get(`http://nuxtserver.test/api/user/${id}`)
        .then(response => response)
        .catch(error => error)
}