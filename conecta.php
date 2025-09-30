<?php
/* Script de conexão ao servidor de banco de dados 
Este arquivo é o responsável por permitir a comunicação entre
seu site/projeto e o servidor MySQL. */

// Parâmetros para conexão
$servidor = "localhost"; // padrão no XAMPP
$banco = "flybynight_tiago";
$usuario = "root"; // padrão no XAMPP
$senha = ""; // padrão no XAMPP

try {
    $conexao = new PDO(
        "mysql:host=$servidor;dbname=$banco;charset=utf8", 
        $usuario, $senha
    );

    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $erro){
    die("Erro ao conectar: ".$erro->getMessage());
}

