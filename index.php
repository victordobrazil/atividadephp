<?php

include_once "objetos/produtoControler.php";

$controller = new produtoControler();
$produtos = $controller->index();
global $produtos;

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senac Rio Claro</title>
    <style>
        table,tr,td{
            border: 1px solid black;
            border-collapse: collapse;

        }
    </style>
</head>
<body>

<h1>Mercado preso</h1>
<h2>Produtos:</h2>

<table>
    <tr>
        <td>id</td>
        <td>nome</td>
        <td>descricao</td>
        <td>preco</td>
        <td>quantidade</td>
    </tr>
    <?php if($produtos):?>
    <?php foreach($produtos as $produtos):?>
    <tr>
        <td><?php echo $produtos->id; ?></td>
        <td><?php echo $produtos->nome;?></td>
        <td><?php echo $produtos->descricao;?></td>
        <td><?php echo $produtos->preco;?></td>
        <td><?php echo $produtos->quantidade;?></td>
    </tr>
    <?php endforeach;?>
    <?php endif;?>



</table>


</body>
</html>