import axios from '@/config/axios'

export default {
    salvar:(usuario)=>{
        return axios.post('auth/store',usuario)
    },
    atualizar:(usuario)=>{
        return axios.put('auth/'+usuario.id,usuario)
    },
    deletar:(usuario)=>{
        return axios.delete('auth/'+usuario.id)
    },
    carregarUsuarios:()=>{
        return axios.get('auth/all')
    }
}

