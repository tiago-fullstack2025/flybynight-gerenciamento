# Referência de comandos SQL para Modelagem Física

## Projeto: Fly By Night - Gerenciamento de Estoque

```sql
-- Criação do banco de dados usando UTF8
CREATE DATABASE flybynight_tiago CHARACTER SET utf8mb4;
```

```sql
-- Criação da tabela de Fornecedores
CREATE TABLE fornecedores(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);
```