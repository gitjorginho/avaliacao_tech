<template>
  <div class="container">
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
          <button type="button" class="btn btn-outline-primary" @click="login()">Login</button>
      </div>
    </div>
  </div>
</template>

<script>

import Login from '@/services/login.service.js'

export default {
    data() {
        return{
            usuario:{}
        }
    },
    methods:{
         login(){
             Login.login(this.usuario).then((response)=>{
                 localStorage.removeItem('token')
                 localStorage.setItem('token',response.data.access_token)
                 this.$router.push('/dashboard')
             }).catch(()=>{
                 alert('Nao autorizado.');
             })
        }
    }

}

</script>
