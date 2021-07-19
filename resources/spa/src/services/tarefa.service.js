import axios from '@/config/axios'

export default {
    salvar:(tarefa)=>{
        return axios.post('tarefas',tarefa)
    },
    atualizar:(tarefa)=>{
        return axios.put('tarefas/'+tarefa.id,tarefa)
    },
    deletar:(tarefa)=>{
        return axios.delete('tarefas/'+tarefa.id)
    },
    carregarTarefas:()=>{
        return axios.get('tarefas')
    },
    concluido:(tarefa)=>{
        return axios.post('tarefas/concluido/'+tarefa.id,tarefa)
    }

}

