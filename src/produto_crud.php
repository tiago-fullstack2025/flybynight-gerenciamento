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


function inserirProduto($conexao, $nome, $descricao, $preco, $quantidade, $fornecedor_id){
    $sql = "INSERT INTO produtos(nome, descricao, preco, quantidade, fornecedor_id)
            VALUES(:nome, :descricao, :preco, :quantidade, :fornecedor_id)";

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(":fornecedor_id", $fornecedor_id);
    $consulta->bindValue(":descricao", $descricao);
    $consulta->bindValue(":quantidade", $quantidade);
    $consulta->bindValue(":preco", $preco);
    $consulta->bindValue(":nome", $nome);

    $consulta->execute();

}


function buscarProdutoPorId($conexao, $id){
    $sql = "SELECT * FROM produtos WHERE id = :id";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":id", $id);
    $consulta->execute();
    return $consulta->fetch();
}