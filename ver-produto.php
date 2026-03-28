<?php
include_once("objetos/produtoControler.php");

$controller = new ProdutoController();

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $p = $controller->localizarProduto($_GET["id"]);
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
    <title>Produto: <?= $p->nome ?></title>
</head>
<body>

<a href="index.php">Voltar</a>
<h1><?= $p->nome ?></h1>
<p><strong>Descrição:</strong> <?= $p->descricao ?></p>
<p><strong>Quantidade:</strong> <?= $p->quantidade ?></p>
<p><strong>Preço:</strong> R$ <?= number_format($p->preco, 2, ',', '.') ?></p>

<?php if (empty($p->imagem)): ?>
    <img style="width: 20%;" src="uploads/imagem-fail.png">
<?php else: ?>
    <img style="width: 20%;" src="uploads/<?= $p->imagem ?>">
<?php endif; ?>

</body>
</html>