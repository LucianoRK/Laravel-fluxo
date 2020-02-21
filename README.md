Pré requisitos:

Servidor php (XAMPP)

Data base (xampp já traz o mysql ou instalar um drive separado)

Navicat

Vs code e plugins

Composer

node ( para ter acesso ao npm )

-----------------------------------------
Fazer o clone do projeto
- Clonar usando o sourcetree
ou
# git clone https://github.com/LucianoRK/projeto.git


intalar as dependencias php no projeto
# composer install

criar na raiz e configurar o seu .env (usar o .env.example como base)

gerar a chave do projeto
# php artisan key:generate

Criar uma base de dados em seu banco

Executar as migrate para criar as tabelas no banco ( o .env tem que estar configurado ! )
# php artisan migrate

intalar as dependencias js no projeto
#npm install

Para biuldar a aplicação
# npm run dev

Iniciar a aplicação
#php artisan serve

-----------

#npm run dev    -> modo desenvolvedor
#npm run prod   -> modo Produção
#npm run watch  -> modo desenvolvedor com atualização automatica (recomendado para desenvolvimento)

