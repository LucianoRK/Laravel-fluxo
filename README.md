# Pré requisitos

- Servidor php (XAMPP)
- Drive DB (XAMPP já traz o Mysql)
- SGBD (Navicat)
- Editor de código (Vs code)
- Composer 

---
# Instalação

## Fazer o clone do projeto
- Clonar usando o sourcetree
ou
`git clone https://github.com/LucianoRK/projeto.git`

- Instalar as dependências php no projeto
`composer install`

- Criar na raiz e configurar o seu .env (usar o .env.example como base)

- gerar a chave do projeto
`php artisan key:generate`

- Criar uma base de dados na sua conexão LOCALHOST

- Executar as migrate para criar as tabelas no banco ( o .env tem que estar configurado ! ), --seed para colocar uma pre configuração
`php artisan migrate --seed`

- Iniciar a aplicação Laravel
-`php artisan serve`

# Commites apenas no galho dev !
