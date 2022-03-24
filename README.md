<p align="center"> Sistema de Agendamento de Aulas </p>
<h4 align="center"> Projeto README - Em construção...</h4>
<p align="center">
  <a href="#sobre">Sobre</a>
  <a href="#sobre">RoadMap</a>
  <a href="#sobre">Tecnologias</a>
  <a href="#sobre">Pré-Requsitos</a>
  <a href="#sobre">Licenças</a>
  <a href="#sobre">Autor</a>
</p>

</br>


<p>Link para o projeto: <a href="http://sisagendamento.herokuapp.com/login">Sis Agendamento</a></p>

## Para instalação
-Descompactar o projeto sis_agendamento em um servidor ou remoto
-O projeto se encontra configurado com o banco de dados chamado "agendamentos" em servidor local e caso servidor remoto.

Caso Local
-Descompactar o projeto em seu servidor local
-Deve ser configurado no projeto ao arquivo .env com os dados do banco que irá utilizar.
-Alterar estas configurações conforme banco a ser utilizado
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=agendamentos
    DB_USERNAME=root
    DB_PASSWORD=root
-Dentro do projeto criar as migrações : php artisan migrate
-Criar as seeders iniciais de teste: php artisan db:seed
-Serão criados os tipos de Usuário Administrador/Professor/Aluno e 7 usuários padrão para teste com senha 123:admin,prof1,prof2,prof3,alun1,alun2,alun3, com isso o sistema esta pronto para uso


Caso Remoto
-Caso deseje subir para o heroku deve ser criado um arquivo Procfile com a seguinte configuração: web: vendor/bin/heroku-php-apache2 public/
-Deve ser configurado no projeto a classe de configuração de database em config/database.php.
-Configurar o driver de default do database que ira utilizar(sqlite,mysql,pgsql,sqlsrv).
Alterar as variaveis de conexão host,database,username e password do banco de dados que ira utilizar
-Subir o projeto para o servidor escolhido
-Dentro do projeto criar as migrações : php artisan migrate
-Criar as seeders iniciais de teste: php artisan db:seed
-Serão criados os tipos de Usuário Administrador/Professor/Aluno e 7 usuários padrão para teste com senha 123:admin,prof1,prof2,prof3,alun1,alun2,alun3, com isso o sistema esta pronto para uso


