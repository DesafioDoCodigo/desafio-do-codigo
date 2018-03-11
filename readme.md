# Desafio do Código

## O que é?

O "Desafio do Código" é um desafio online com um conjunto de missões que guiam você por ferramentas digitais para aprender programação, matemática e inglês. 
Foi criado por  [Soraia Novaes](http://professoragoogle.com.br/) para auxiliar crianças de 10 a 108 anos a aprender estas habilidades tão necessárias no mundo atual.

## Este repositório

É o repositório único do projeto, implementado em PHP por alguns voluntários e que agora está sendo atualizado para um padrão mais limpo e moderno de código.
Se você deseja colaborar, seja bem-vindo! Acesse as issues do projeto e escolha uma para desenvolver!

# Rodando o projeto em desenvolvimento

1. Baixe o código do repositório usando seu git
1. Acesse em seu browser usando seu servidor local, algo como ```http://localhost/desafio_do_codigo```. Deverá aparecer um erro "Não foi encontrado seu arquivo de configuração do ambiente". Siga em frente.
1. Crie seu banco de dados local usando o script contido em /config/database.sql
1. Crie agora o arquivo de configurações exclusivo de seu ambiente. Faça isso conferindo as instruções em /config/sampleConfig.php.


## Acessar por url do hostgator (por fora do domínio, cloudflare)
```http://br410.teste.website/~desaf342/desafio/```

# Banco de dados

## Queries úteis

Usuários que nunca logaram:
``SELECT count(*) FROM users where last_login is null``
