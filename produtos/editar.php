<?php
require_once "../src/fornecedor_crud.php";
require_once "../src/produto_crud.php";

$id = $_GET['id'];

$produto = buscarProdutoPorId($conexao, $id);

$fornecedores = buscarFornecedores($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    <h1>Editar produto</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?=$produto['id']?>">

        <div>
            <label for="nome">Nome:</label>
            <input value="<?=$produto['nome']?>" type="text" name="nome" id="nome" required>
        </div>
        <div>
            <label for="descricao">Descrição:</label>
            <!-- Não dê enter ou identação dentro da tag textarea, pois
             os espaços vão aparecer se fizer isso. Portanto, deixe tudo na mesma linha -->
            <textarea name="descricao" id="descricao" rows="5"><?=$produto['descricao']?></textarea>
        </div>

        <div>
            <label for="preco">Preço:</label>
            <input value="<?=$produto['preco']?>" type="number" name="preco" id="preco" required min="0" step="0.01">
        </div>

        <div>
            <label for="quantidade">Quantidade:</label>
            <input value="<?=$produto['quantidade']?>" type="number" name="quantidade" id="quantidade" required min="0">
        </div>

        <div>
            <label for="fornecedor">Fornecedor:</label>
            
            <select name="fornecedor" id="fornecedor">
                <!-- Sempre mantenha um option vazio.
                É o usuário que deve vir aqui escolher. -->
                <option value=""></option>

                <?php foreach($fornecedores as $fornecedor): ?>
                <option value="<?=$fornecedor['id']?>">
                    <?=$fornecedor['nome']?>
                </option>
                <?php endforeach; ?>

            </select>

        </div>
        <button type="submit">Atualizar</button>
    </form>

    <a href="listar.php">← Voltar</a>

</body>
</html>