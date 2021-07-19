import axios from '@/config/axios'

export default{

    login:(usuario)=>{
      return axios.post('auth/login',usuario)
    }
}

