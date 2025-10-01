<?php
require_once "../src/fornecedor_crud.php";

// Pegando da url o valor do parâmetro chamado id
$id = $_GET['id'];

// Chamamos a função, passando dados de conexão e o id do fornecedor a ser buscado
$fornecedor = buscarFornecedorPorId($conexao, $id);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar fornecedor</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>Editar fornecedor</h1>

    <form action="" method="post">
        <div>
            <label for="nome">Nome:</label>
            <input value="<?=$fornecedor['nome']?>" type="text" name="nome" id="nome" required>
        </div>
        <button type="submit">Atualizar</button>
    </form>

    <a href="listar.php">← Voltar</a>

</body>
</html>