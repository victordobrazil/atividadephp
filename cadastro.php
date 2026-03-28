<?php
include_once("objetos/produtoControler.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new ProdutoController();

    if (isset($_POST["cadastrar"])) {
        $controller->cadastrarProduto($_POST["produto"], $_FILES["produto"]);
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Produto</title>
</head>
<body>
<h1>Cadastro de Produto</h1>
<a href="index.php">Voltar</a>

<form action="cadastro.php" method="post" enctype="multipart/form-data">
    <label>Nome</label>
    <input type="text" name="produto[nome]"><br><br>
    <label>Descrição</label>
    <input type="text" name="produto[descricao]"><br><br>
    <label>Quantidade</label>
    <input type="text" name="produto[quantidade]"><br><br>
    <label>Preço</label>
    <input type="text" name="produto[preco]"><br><br>

    <label for="fileToUpload">Selecionar Foto</label>
    <input type="file" name="produto[fileToUpload]" id="fileToUpload"><br><br>

    <button name="cadastrar">Cadastrar</button>
</form>
</body>
</html>