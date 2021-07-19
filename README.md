1. - acessar diretorio  gerenciador\_tarefas/

$ composer i

2- copiar .env.exemple para .env (necessario parametrizar a conexao com o banco e servidor smtp)

3- criar database "ger\_tarefas"

4- $ php artisan migrate

* criar novo usuario

5 - php artisan commnad:user

(será feita duas perguntas, qual email e qual a senha) 	

6 - acessar diretorio  gerenciador\_tarefas/resources/spa

$ npm i


7- gerenciador\_tarefas\resources\spa\src\config

editar arquivos axios.js

coloca o endereco da api na linha dois como no exemplo

arquivo axios.js

...

1. const instance = axios.create({
1. baseURL:'http://avaliacao\_tech1.test/api/'
1. })

...



7 - acessar diretorio  gerenciador\_tarefas/resources/spa

$ npm run serve
