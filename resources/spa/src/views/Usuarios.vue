<template>
<div>
    <div class="card card-body col-md-6 offset-md-3 mt-5">
      <div class="form-group">
        <label for="">Email</label>
        <input type="text" v-model="usuario.email" class="form-control" />
      </div>
      <div class="form-group">
        <label for="">Senha</label>
        <input type="password" v-model="usuario.password" class="form-control" />
      </div>
      <div class="form-group">
          <button type="button" class="btn btn-outline-primary" @click="salvar()">Salvar</button>
      </div>
    </div>

    <div class="card card-body col-md-6 offset-md-3 mt-5">
    <table class="table">
        <tr>
            <th class="col-md-1">Codigo</th>
            <th class="col-md-8">Email</th>
            <th class="col-md-3"></th>
        </tr>
        <tr v-for="usuario in usuarios" :key="usuario.id">
            <td>{{ usuario.id }}</td>
            <td>{{ usuario.email }}</td>
            <td>
                <button class="btn btn-outline-info mr-2" @click="editar(usuario)"><i class="far fa-edit"></i></button>
                <button class="btn btn-outline-danger mr-2" @click="deletar(usuario)"><i class="far fa-trash-alt"></i></button>
            </td>
        </tr>

    </table>
    </div>


</div>

</template>

<script>

import Usuario from '@/services/usuario.service'

export default {
    data() {
       return {
           usuario:{},
           usuarios:[]

       }
    },
    methods:{
        carregarUsuarios(){
          Usuario.carregarUsuarios()
          .then((response)=>{
             console.log(response.data.data)
             this.usuarios = response.data.data
          }).catch(()=>{alert('Erro ao processar')})
        },
        salvar(){
          if(!this.usuario.id){
          Usuario.salvar(this.usuario).then(()=>{
              alert('Salvo com sucesso.')
              this.usuario = {}
              this.carregarUsuarios()
          }).catch(()=>{alert('Erro ao processar')})
          }else{
              Usuario.atualizar(this.usuario).then(()=>{
              alert('Salvo com sucesso.')
              this.usuario = {}
              this.carregarUsuarios()
          }).catch(()=>{alert('Erro ao processar')})
          }
        },
        editar(usuario){
            this.usuario = Object.assign({},usuario)
        },
        deletar(usuario){
            Usuario.deletar(usuario).then(()=>{
              alert('Deletado com sucesso.')
              this.usuario = {}
              this.carregarUsuarios()
            })
            .catch(()=>{alert('Erro ao processar')})
        }

    },
    created(){
        this.carregarUsuarios()
    }


}
</script>

