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

```sql
CREATE TABLE produtos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    quantidade INT NOT NULL,

    -- Aqui, criamos fornecedor_id como uma coluna/campo comum
    fornecedor_id INT NOT NULL,

    -- E aqui, transformamos fornecedor_id em uma CHAVE ESTRANGEIRA
    -- que faz REFERÊNCIA à CHAVE PRIMÁRIA (id) de outra tabela 
    -- (fornecedores)
    FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id)
);
```

```sql
-- Criação da tabela de Lojas
CREATE TABLE lojas(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL
);
```

```sql
CREATE TABLE lojas_produtos(
    loja_id INT NOT NULL,
    produto_id INT NOT NULL,
    estoque INT NOT NULL,

    -- Criando uma CHAVE PRIMÁRIA COMPOSTA, ou seja,
    -- baseada em mais de uma coluna/campo
    PRIMARY KEY(loja_id, produto_id),

    -- Se na tabela de lojas uma loja for excluída,
    -- aqui na tabela lojas_produtos TODOS OS REGISTROS de estoque
    -- desta loja excluída TAMBÉM SERÃO EXCLUÍDOS.
    FOREIGN KEY (loja_id) REFERENCES lojas(id) ON DELETE CASCADE,

    -- Ao tentar excluir um produto, se este produto está sendo
    -- usando em algum registro de estoque, NÃO PODEMOS PERMITIR
    -- a exclusão! [isso já é o padrão]
    FOREIGN KEY (produto_id) REFERENCES produtos(id) ON DELETE RESTRICT
);
```