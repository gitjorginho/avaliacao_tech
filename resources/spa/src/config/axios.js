import axios from 'axios'

const instance = axios.create({
    baseURL:'http://gerenciador_tarefa.test/api/'
})

instance.defaults.headers.common['Authorization'] = 'bearer '+localStorage.getItem('token');


export default instance
