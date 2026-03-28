<?php
include_once("objetos/produtoControler.php");

$controller = new ProdutoController(); // ✅ CORRIGIDO: nome da classe com P maiúsculo

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["alterar"])) {
    $p = $controller->localizarProduto($_GET["alterar"]);
} elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["produto"])) {
    $controller->atualizarProduto($_POST["produto"], $_FILES["produto"]);
} else {
    header("Location: index.php");
    exit();
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

<form action="atualizar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="produto[id]"       value="<?= $p->id ?>">
    <!-- ✅ CORRIGIDO: envia a imagem atual para o controller não apagar -->
    <input type="hidden" name="produto[img_atual]" value="<?= $p->imagem ?>">

    <label>Nome</label>
    <input type="text" name="produto[nome]"       value="<?= $p->nome ?>"><br><br>
    <label>Descrição</label>
    <input type="text" name="produto[descricao]"  value="<?= $p->descricao ?>"><br><br>
    <label>Quantidade</label>
    <input type="text" name="produto[quantidade]" value="<?= $p->quantidade ?>"><br><br>
    <label>Preço</label>
    <input type="text" name="produto[preco]"      value="<?= $p->preco ?>"><br><br>

    <!-- Imagem atual -->
    <?php if (!empty($p->imagem)): ?>
        <p>Imagem atual:</p>
        <img src="uploads/<?= $p->imagem ?>" style="width:100px"><br><br>
    <?php endif; ?>

    <label for="fileToUpload">Nova Foto (opcional)</label>
    <input type="file" name="produto[fileToUpload]" id="fileToUpload"><br><br>

    <button name="atualizar">Atualizar</button>
</form>
</body>
</html>