# Referência de comandos SQL para Modelagem Física

## Projeto: Fly By Night - Gerenciamento de Estoque

```sql
CREATE DATABASE flybynight_tiago CHARACTER SET utf8mb4;
```

```sql
CREATE TABLE fornecedores(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);
```