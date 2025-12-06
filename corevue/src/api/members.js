import axios from 'axios';

const api = axios.create({
  baseURL: import.meta.env.VITE_API_BASE || 'http://127.0.0.1:8000/api',
  withCredentials: true, // for Sanctum cookie-based auth if used
});

export default {
  async getMembers() {
    const res = await api.get('/members');
    return res.data;
  },
  async addMember(payload) {
    // If using Sanctum CSRF protection, call /sanctum/csrf-cookie before POST
    try {
      await api.get('/sanctum/csrf-cookie');
    } catch (e) {
      // ignore if backend doesn't have this endpoint
    }
    const res = await api.post('/members', payload);
    return res.data;
  },
  async deleteMember(id) {
    try {
      await api.get('/sanctum/csrf-cookie');
    } catch (e) {}
    const res = await api.delete(`/members/${id}`);
    return res.data;
  },
};
