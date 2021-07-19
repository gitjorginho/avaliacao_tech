<template>
  <div>
    <div class="jumbotron">
      <h1 class="display-4">Gerenciador de tarefas</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <router-link class="nav-link" to="/dashboard/usuarios">Usuarios</router-link>

          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/dashboard/tarefas">Tarefas</router-link>
          </li>

        </ul>
      </div>
    </nav>
    <router-view/>
  </div>
</template>
