# Pojeto Sistema de Contatos

## Sobre o projeto

O objetivo do projeto foi desenvolver um sistema em Php usando o Doctrine ORM e PostgreSQL como banco de dados, onde o usuário pode cadastrar uma Pessoa e posteriormente cadastrar Contatos para essa Pessoa.

### Requisitos funcionais

O sistema incluirá as seguintes funcionalidades:

RF01 - O sistema deve manter uma tela de consulta para pessoas.

RF02 - O sistema deve manter um campo de pesquisa por nome de pessoa.

RF03 - O sistema deve manter uma tela de consulta para contatos.

RF04 - O sistema deve manter um CRUD (Cadastrar, Visualizar, Alterar, Excluir) para pessoas.

RF05 - O sistema deve manter um CRUD (Cadastrar, Visualizar, Alterar, Excluir) para contato.

### Banco de Dados

O sistema é baseado em um banco de dados relacional (PostgreSQL) que armazenará os seguintes tipos de informações:

 São dados de pessoas: Nome e CPF.

 São dados de contato: Tipo (Telefone ou Email), Descrição.

 Uma pessoa pode ter vários contatos


### Principais tecnologias utilizadas:

- **Docker:** 
- **PHP 7.4:** 
- **Dctrine ORM:** 
- **Javascript:**
- **PostgreSQL:** 
- **Html:**
- **Css:**
- **Bootstrap:** 

## Instalação do projeto

### Pré-requisitos

Antes de iniciar, certifique-se de que você tenha os seguintes pré-requisitos instalados:

- **VS Code** [https://code.visualstudio.com/](https://code.visualstudio.com/) ou qualquer outro editor de código

- **Docker:** [https://www.docker.com/get-started](https://www.docker.com/get-started)

- **psql:** Será usado para rodar o arquivo de scripts sql, caso não seja usado um gerenciador como o DBeaver para criação das tabelas. Para instalar o psql, você pode seguir as instruções do site oficial ou usar o gerenciador de pacotes do seu sistema operacional. No linux:
```sh
   sudo apt install postgresql-client
   ```

- **Git:** [https://git-scm.com/downloads](https://git-scm.com/downloads)

Certifique-se de seguir as instruções de instalação apropriadas para o seu sistema operacional.

### Execução do projeto

1. Clone o repositório
   ```sh
   git clone git@github.com:joao21dev/magazord.git
   ```
2. Entre no repositório
   ```sh
   cd magazord
   ```
2. Rode o container docker com o banco de dados (porta padrão 5432)
   ```js
   docker compose up --build
   ```
3. Abra outra janela do terminal no mesmo diretório e acesse a pasta Infra para criar as tabelas
   ```sh
   cd src/Infra
   ```
4.  Crie as tabelas do banco (password: admin). Aqui é necessário ter o psql, caso utilize um gerenciador, basta usar as credenciais que estão no .env e colar o script ddl localizado em src/infra/ddl.sql`.
   ```js
   docker exec -i postgres psql -U admin -d postgres < ddl.sql
   ```

5. Acesse o projeto no endereço localhost:8000

