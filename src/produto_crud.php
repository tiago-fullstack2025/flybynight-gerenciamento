<?php
// src/produto_crud.php

require_once "../conecta.php";

function buscarProdutos($conexao){
    $sql = "SELECT
                produtos.id, produtos.nome AS nome_produto,
                produtos.preco, produtos.quantidade,
                fornecedores.nome AS nome_fornecedor
            FROM produtos JOIN fornecedores
            ON fornecedores.id = produtos.fornecedor_id
            ORDER BY produtos.nome";

    $consulta = $conexao->query($sql);
    return $consulta->fetchAll();
}