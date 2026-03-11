<?php
include_once("objetos/AlunoControler.php");

$controller = new AlunoControler();

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["alterar"])) {
    $a = $controller->localizarAluno($_GET["alterar"]);
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["aluno"])) {
    $a = $controller->atualizarAluno($_POST["aluno"]);
} else {
    header("Location: index.php");
}

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atualização de Produto</title>
</head>
<body>
<h1>Atualização de Produto</h1>
<a href="index.php">Voltar</a>

<form action="atualizar.php" method="post">
    <input type="text" name="produto[id]" value="<?= $a->id ?> " hidden>
    <label>Nome</label>
    <input type="text" name="produto[nome]" value="<?= $a->nome ?> "><br><br>
    <label>Descrição</label>
    <input type="text" name="produto[descricao]" value="<?= $a->descricao ?> "><br><br>
    <label>Quantidade</label>
    <input type="text" name="produto[quantidade]" value="<?= $a->quantidade ?> "><br><br>
    <label>Preço</label>
    <input type="text" name= produto[preco]" value="<?= $a->preco ?> "><br><br>

    <button name="atualizar">Atualizar</button>
</form>

</body>
</html>