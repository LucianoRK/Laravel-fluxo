# Pré requisitos

- Servidor php (XAMPP)
- Drive DB (XAMPP já traz o Mysql)
- SGBD (Navicat)
- Editor de código (Vs code)
- Composer 
- Node ( para ter acesso ao npm )

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

- Criar uma base de dados em seu banco

- Executar as migrate para criar as tabelas no banco ( o .env tem que estar configurado ! )
`php artisan migrate`

-Instalar as dependências js no projeto
`npm install`

- Build da aplicação
`npm run dev`

-Iniciar a aplicação
-`npm run dev`

---
# Outros comandos

- Build modo desenvolvedor `npm run dev`
- Build modo Produção `npm run prod`
- Build modo desenvolvedor com atualização automatica (recomendado para desenvolvimento) `npm run watch`

---

# Commites apenas no galho dev !
