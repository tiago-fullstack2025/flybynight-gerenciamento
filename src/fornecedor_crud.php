<?php
/* Neste arquivo teremos todas as funções que serão usadas
para manipulação (CRUD) de Fornecedores em nosso sistema
e banco de dados. */

// Acessando o script de conexão ao BD
require_once "../conecta.php";

/* Retornará um array associativo com os fornecedores  */
function buscarFornecedores($conexao){
    // Montamos o comando SQL para a consulta
    $sql = "SELECT * FROM fornecedores ORDER BY nome";

    // Executamos o comando e guardamos o resultado da consulta
    $consulta = $conexao->query($sql);

    // Retornamos o resultado em formato de Array Associativo
    return $consulta->fetchAll();
}

/* Recebe o nome de um novo fornecedor e insere no BD */
function inserirFornecedor($conexao, $nome){
    /* Montando o comando SQL de INSERT e aplicando um
    "named parameter (parâmetro nomeado)". Um parâmetro nomeado
    nada mais é do que reservar um espaço para atribuir um valor
    ao comando. */
    $sql = "INSERT INTO fornecedores (nome) VALUES(:nome)";

    // Prepare o comando acima ANTES de executar no BD
    $consulta = $conexao->prepare($sql);

    // Anexar/atrelar/colocar um valor
    $consulta->bindValue(":nome", $nome);

    // Executamos a consulta com o comando e o valor
    $consulta->execute();
}

/* Recebe o id do fornecedor a ser carregado (e depois atualizado) */
function buscarFornecedorPorId($conexao, $id){
    $sql = "SELECT * FROM fornecedores WHERE id = :id";

    // prepare: coloca o comando sql em memória
    $consulta = $conexao->prepare($sql); 

    // bindValue: liga o valor ($id) ao parâmetro (:id)
    $consulta->bindValue(':id', $id);

    // execute: roda a query/consulta no banco
    $consulta->execute();

    // retorna o resultado da consulta como um array (vetor)
    return $consulta->fetch();
}

/* Recebe nome e id do fornecedor que será atualizado */
function atualizarFornecedor($conexao, $nome, $id){
    $sql = "UPDATE fornecedores SET nome = :nome WHERE id = :id";
    
    $consulta = $conexao->prepare($sql);

    // Vincular os valores aos parâmetros
    $consulta->bindValue(":nome", $nome);
    $consulta->bindValue(":id", $id);

    $consulta->execute();
}