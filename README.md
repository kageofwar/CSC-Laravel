## Projeto Csc-books

- Objetivo
"Utilizando Laravel e suas Blades, juntamente com Bootstrap/Tailwind, construí um sistema que realiza buscas em uma API externa para obter informações sobre um determinado autor, além de permitir operações básicas como criar, visualizar, editar e excluir dados, integrando-se ao banco de dados MySQL."

**Pre-requisitos ⚙**
* [PHP](https://www.php.net/)
* [Composer](https://getcomposer.org/)
* [MySQL](https://getcomposer.org/)
* [Node](https://nodejs.org/en)
*  Ctype PHP Extension
*   cURL PHP Extension
*   DOM PHP Extension
*   Fileinfo PHP Extension
*   Filter PHP Extension
*   Hash PHP Extension
*   Mbstring PHP Extension
*   OpenSSL PHP Extension
*   PCRE PHP Extension
*   PDO PHP Extension
*   Session PHP Extension
*   Tokenizer PHP Extension
*   XML PHP Extension

## Primeiros passos para instalção 👇

- Navegue para o local que deseja clonar o repositorio e execute o seguinte comando:
* `git clone https://github.com/kageofwar/CSC-Laravel.git`

- Logo após acesse o diretorio onde está o projeto:
* `cd CSC-Laravel`

- No diretorio do projeto execute:
* `composer install`

- realize uma copia do arquivo .env.example, mas sem o .example e faça a seguinte configuração :
~~~
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<nome da database>
DB_USERNAME=<usuario mysql>
DB_PASSWORD=<senha mysql>
~~~

- Certifique-se tambem de criar um database com o mesmo nome do configurado em seu .env, sem isso sera impossivel rodar as migrations.
* `mysql -u<usuario> -p<senha>`
* `CREATE DATABASE <nome da database>`

Agora pra rodar o sistema:
* `php artisan key:generate`
* `npm run build`
* `php artisan migrate` = para executar as migrations
* `php artisan serve` = para inciar o servidor

E por fim verifique se a api está rodando acessando a rota [http://127.0.0.1:8000]
