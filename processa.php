<?php
$nome = filter_input(INPUT_GET,"nome",FILTER_DEFAULT);
$descricao = filter_input(INPUT_GET,"descricao",FILTER_DEFAULT);
$preco = filter_input(INPUT_GET,"preco",FILTER_DEFAULT);

if(trim($nome) === "" || $nome === null ||
    trim($descricao) === "" || $descricao === null ||
    trim($preco) === "" || $preco === null ){
    header("Location: index.php");
    exit;
}

$nomeseguro = htmlspecialchars($nome,ENT_QUOTES,'UTF-8');
$descricaos = htmlspecialchars($descricao,ENT_QUOTES,'UTF-8');
$precos = htmlspecialchars($preco,ENT_QUOTES,'UTF-8');

echo "Olá $nomeseguro! ";
echo "Curso: $descricaos";
echo "Idade: $precos";
