
1 - acessar diretorio  avaliacao_tech/
   $ composer i

2- copiar .env.exemple para .env (necessario parametrizar a conexao com o banco e servidor smtp)

3- criar database "ger_tarefas"

4- $ php artisan migrate

* criar novo usuario 
5 - php artisan commnad:user   
(será feita duas perguntas, qual email e qual a senha) 	

6 - acessar diretorio  avaliacao_tech/resources/spa  
    $ npm i


7- avaliacao_tech\resources\spa\src\config
   editar arquivos axios.js

coloca o endereco da api na linha dois como no exemplo:
arquivo axios.js
...
1. const instance = axios.create({
2.     baseURL:'http://avaliacao_tech1.test/api/'
3. })
...


7 - acessar diretorio  avaliacao_tech/resources/spa  
    $ 
