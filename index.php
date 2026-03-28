<?php
include_once "objetos/produtoControler.php";

session_start();

//var_dump($_SESSION["aluno"]);
//
//die();




$controller = new ProdutoController();
$produtos = $controller->index();
global $produtos;
$p = null;

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["pesquisar"])){
        $p = $controller->pesquisarProduto($_POST["pesquisar"]);
    }
}

if($_SERVER["REQUEST_METHOD"] === "GET"){
    if(isset($_GET["excluir"])){
        $p = $controller->excluirProduto($_GET["excluir"]);
    }
}
if($_SERVER["REQUEST_METHOD"] === "GET"){
    if(isset($_GET["atualizar"])){
        $p = $controller->atualizarProduto($_GET["atualizar"]);
    }
}

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senac Rio Claro</title>
    <style>
        /* Estilização da tabela  */
        table,tr,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>



<h1>Senac Rio Claro</h1>
<a href="cadastro.php">Cadastrar Produto</a>

<h3>Pesquisar produto</h3>
<form method="POST" action="index.php">
    <label>id</label>
    <input type="number" name="pesquisar">
    <button>Pesquisar</button>
</form>


<h2>Produtos Cadastrados</h2>
<table>
    <tr>
        <td>id</td>
        <td>Nome</td>
        <td>descrição</td>
        <td>quantidade</td>
        <td>preco</td>
        <td>imagem</td>
    </tr>
    <?php if($produtos) : ?>
        <?php foreach($produtos as $produto) : ?>
            <tr>
                <td><a href="ver-produto.php?id=<?= $produto->id; ?>"><?= $produto->id; ?></a> </td>
                <td><?= $produto->nome ?></td>
                <td><?= $produto->descricao ?></td>
                <td><?= $produto->quantidade ?></td>
                <td><?= $produto->preco ?></td>
                <td>
                    <?php if(!empty($produto->imagem)): ?>
                        <img style="width: 20%;" src="uploads/<?= $produto->imagem ?>"> <!-- ✅ tag fechada -->
                    <?php else: ?>
                        <img style="width: 20%;" src="uploads/imagem-fail.png"> <!-- ✅ fallback -->
                    <?php endif; ?>
                </td>
                <td><a href="atualizar.php?alterar=<?= $produto->id ?>">Alterar</a></td>
                <td><a href="index.php?excluir=<?= $produto->id ?>">Excluir</a></td>
                <td><a href="ver-produto.php?id=<?= $produto->id ?>">Visualizar</a> </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>

</body>
</html>