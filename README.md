# cashsystem
Sistema frente de caixa

## Guia de implementação

Clone o projeto: https://github.com/silvanotfound/cashsystem.git

Extraia a pasta cashsystem e coloque no servidor de aplicação.

Se estiver executando localmente, após configurar o banco de dados acesse:

http://localhost/cashsystem

## Configuração do banco de dados ‘postgres’

Para configurar o acesso ao banco de dados, acesso o arquivo DataBase.php contido na pasta lib do projeto cashsystem.

altere as informações:

$host: IP do servidor ou localhost se for rodar localmente.

$port: porta do banco de dados por padrão é 5432.

$baseConnection: base que a aplicação irá se conectar.

$user: usuário do banco de dados: para o postgres o user padrão e postgres.

$password: senha do banco de dados.

O arquivo DataBase.php está pré configurado, basta criar a base de dados cashsystem e colocar a senha ‘root’.

