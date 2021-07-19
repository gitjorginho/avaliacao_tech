<template>
   <div>
    <div class="card card-body col-md-6 offset-md-3 mt-5">
      <div class="form-group">
        <label for="">Tarefa</label>
        <input type="text" v-model="tarefa.tarefa" class="form-control" />
      </div>
      <div class="form-group">
          <button type="button"  class="btn btn-outline-primary" @click="salvar()" >Salvar</button>
      </div>
    </div>
    <div class="card card-body col-md-6 offset-md-3 mt-5">
    <table class="table">
        <tr>
            <th class="col-md-1">Codigo</th>
            <th class="col-md-7">Tarefa</th>
            <th class="col-md-1">Data conclusao</th>
            <th class="col-md-3"></th>
        </tr>
        <tr v-for="tarefa in tarefas" :key="tarefa.id">
            <td>{{ tarefa.id }}</td>
            <td>{{ tarefa.tarefa }}</td>
            <td>{{ tarefa.data_conclusao }}</td>
            <td>
                <button class="btn  mr-2" :class="[tarefa.concluido == 'sim'?'btn-success':'btn-outline-secondary']" @click="concluido(tarefa)"><i class="fas fa-check"></i></button>
                <button class="btn btn-outline-info mr-2" @click="editar(tarefa)"><i class="far fa-edit"></i></button>
                <button class="btn btn-outline-danger mr-2" @click="deletar(tarefa)"><i class="far fa-trash-alt"></i></button>
            </td>
        </tr>
    </table>

    </div>
</div>

</template>

<script>

import Tarefa from '@/services/tarefa.service'

export default {
    data() {
       return {
           tarefa:{tarefa:''},
           tarefas:[]
       }
    },
    methods:{
        carregarTarefas(){
          Tarefa.carregarTarefas()
          .then((response)=>{
             console.log(response.data.data)
             this.tarefas = response.data.data
          }).catch(()=>{alert('Erro ao processar')})
        },
        salvar(){
          if(!this.tarefa.id){
          Tarefa.salvar(this.tarefa).then(()=>{
              alert('Salvo com sucesso.')
              this.tarefa = {}
              this.carregarTarefas()
          }).catch(()=>{alert('Erro ao processar')})
          }else{
              Tarefa.atualizar(this.tarefa).then(()=>{
              alert('Salvo com sucesso.')
              this.tarefa = {}
              this.carregarTarefas()
          }).catch(()=>{alert('Erro ao processar')})
          }
        },
        editar(tarefa){
            this.tarefa = Object.assign({},tarefa)
        },
        deletar(tarefa){
            Tarefa.deletar(tarefa).then(()=>{
              alert('Deletado com sucesso.')
              this.tarefa = {}
              this.carregarTarefas()
            })
            .catch(()=>{alert('Erro ao processar')})
        },
        concluido(tarefa){
                if(tarefa.concluido == 'sim'){
                    tarefa.concluido ='nao'
                }else{
                    tarefa.concluido ='sim'
                }

                Tarefa.concluido(tarefa).then(()=>{
                    this.carregarTarefas()
                }).catch(()=>{
                    alert('Erro ao processar')
                })


        }

    },
    created(){
        this.carregarTarefas()
    }


}
</script>
